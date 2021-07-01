<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return responseSuccess($user, __('auth.register_success'));
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
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password]) || Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $data = new \stdClass();
            $data->user = $user;
            $data->token = $user->createToken('MyApp')->accessToken;
            return responseSuccess($data, 'logged in successfully');
        }

        return responseFail('Unauthorized', 401);
    }
}
