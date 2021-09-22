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
Route::get('get-targets', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_targets']);
Route::get('get-diets', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_diets']);
Route::get('get-foods', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_foods']);
Route::get('get-dishes', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_dishes']);
Route::get('get-mealtypes', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_mealtypes']);
Route::get('get-address-create-data', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_address_create_data']);
Route::get('get-ingredients', [\App\Http\Controllers\Api\ApiHomeController::class, 'get_ingredients']);

Route::group(['middleware' => ['auth:api']], function () {

    Route::get('user', function (Request $request) {
        return responseSuccess(new UserResource($request->user()));
    });
    Route::put('update-profile', [\App\Http\Controllers\Api\UserController::class, 'update_profile']);
    Route::get('user-get-address', [\App\Http\Controllers\Api\AddressController::class, 'user_get_address']);
    Route::delete('user-delete-address/{id}', [\App\Http\Controllers\Api\AddressController::class, 'user_delete_address']);
    Route::put('user-update-address/{id}', [\App\Http\Controllers\Api\AddressController::class, 'user_update_address']);
    Route::post('user-add-address', [\App\Http\Controllers\Api\AddressController::class, 'user_add_address']);
});
