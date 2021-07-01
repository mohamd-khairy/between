<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'isAdmin'], 'as' => 'admin.'], function () {
    Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('target', \App\Http\Controllers\Admin\TargetController::class);
    Route::resource('diet', \App\Http\Controllers\Admin\DietController::class);
    Route::resource('daynumber', \App\Http\Controllers\Admin\DayNumberController::class);
    Route::resource('state', \App\Http\Controllers\Admin\StateController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('address', \App\Http\Controllers\Admin\AddressController::class);
});
