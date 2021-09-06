<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\ForgetPasswordEmail;
use App\Notifications\VerifiyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validateData = Validator::make($data, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|unique:users,phone',
        ]);
        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::create($data);

        try {
            $user_data = implode(',', [$request->email]);
            $code = encrypted($user_data);
            $user->code = $code;
            $user->save();
            $user->notify(new VerifiyEmail($request->email, $code, $request->name));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return responseSuccess([], __('auth.register_success'));
    }

    public function login(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'phone' => 'required_without:email',
            'email' => 'required_without:phone|email',
            'password' => 'required|string|min:6', //|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->email_verified_at == null) {
                return responseFail('Please Verify Your Email');
            }
            $data = new \stdClass();
            $data->user = new UserResource($user);
            $data->token = $user->createToken('MyApp')->accessToken;
            return responseSuccess($data, 'logged in successfully');
        }

        return responseFail('Unauthorized', 401);
    }

    public function forget_password(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        $user = User::where('email', $request->email)->first();
        $user->update(['code' => rand(1000, 9999)]);

        try {
            $user->notify(new ForgetPasswordEmail($user->code));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return responseSuccess([], 'Check Your Email Address.');
    }

    public function new_password(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'code' => 'required|exists:users,code',
            'password' => 'required|min:6',
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        $user = User::where('code', $request->code)->first();
        $user->update(['password' => Hash::make($request->password), 'code' => null]);

        return responseSuccess([], 'password changed successfully');
    }

    public function verify(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'code' => 'required|exists:users,code',
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        $data = explode(',', decrypted($request->code));
        $email = $data[0];

        /** get user with this email and this code */
        $user = User::where(['email' => $email, 'code' => $request->code])->first();

        if ($user) {

            $user->code = null;
            $user->email_verified_at = now();
            $user->save();

            return responseSuccess(['url' => asset('/api/login')], "email verified successfully .");
        } else {
            return responseFail("Sorry , some thing wrong !");
        }
    }

    public function update_profile(Request $request)
    {
        $user = auth('api')->user();

        $data = $request->all();
        $validateData = Validator::make($data, [
            'name' => 'nullable|min:3',
            'phone' => 'nullable|unique:users,phone,' . $user->id,
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'birth_date' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female',
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::find($user->id);
        $user->update($data);

        return responseSuccess(new UserResource($user), __('cruds.updated_success'));
    }
}
