<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|unique:users,phone',
        ]);
        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        $user = User::create($request->all());
        return responseSuccess($user, __('auth.register_success'));
    }

    public function login(Request $request)
    {
        if ($request->email && $request->password) {
            $validateData = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6', //|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/
            ]);

            if ($validateData->fails()) {
                return responseFail($validateData->errors()->first());
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $data = new \stdClass();
                $data->user = $user;
                $data->token = $user->createToken('MyApp')->accessToken;
                return responseSuccess($data, 'logged in successfully');
            }
        }
        return responseFail('Unauthorized', 401);
    }
}