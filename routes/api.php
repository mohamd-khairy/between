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
Route::get('verify', [\App\Http\Controllers\Api\UserController::class, 'verify']);
Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('forget-password', [\App\Http\Controllers\Api\UserController::class, 'forget_password']);
Route::post('new-password', [\App\Http\Controllers\Api\UserController::class, 'new_password']);

Route::get('get-public-data', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_public_data']);
Route::get('get-diets-days', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_diet_days']);
Route::get('get-address-create-data', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_address_create_data']);


Route::group(['middleware' => ['auth:api']], function () {

    Route::get('user', function (Request $request) {
        return responseSuccess(new UserResource($request->user()));
    });
    Route::put('update-profile', [\App\Http\Controllers\Api\UserController::class, 'update_profile']);
    Route::get('user-get-address', [\App\Http\Controllers\Api\AddressController::class, 'user_get_address']);
    Route::post('user-add-address', [\App\Http\Controllers\Api\AddressController::class, 'user_add_address']);
});
