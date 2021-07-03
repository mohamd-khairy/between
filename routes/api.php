<?php

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [\App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);

Route::get('get-public-data', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_public_data']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('user', function (Request $request) {
        return responseSuccess(new UserResource($request->user()));
    });
    Route::get('user-get-address', [\App\Http\Controllers\Api\AddressController::class, 'user_get_address']);
    Route::post('user-add-address', [\App\Http\Controllers\Api\AddressController::class, 'user_add_address']);
});
