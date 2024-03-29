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
// Route::redirect('/', 'home');
Route::get('/content/{name}', [\App\Http\Controllers\Admin\HelperController::class, 'web_static_page']);

Route::group(['middleware' => ['auth', 'isAdmin'], 'as' => 'admin.'], function () {
    Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('target', \App\Http\Controllers\Admin\TargetController::class);
    Route::resource('diet', \App\Http\Controllers\Admin\DietController::class);
    Route::resource('daynumber', \App\Http\Controllers\Admin\DayNumberController::class);
    Route::resource('mealnumber', \App\Http\Controllers\Admin\MealNumberController::class);
    Route::resource('state', \App\Http\Controllers\Admin\StateController::class);
    Route::resource('city', \App\Http\Controllers\Admin\CityController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('address', \App\Http\Controllers\Admin\AddressController::class);
    Route::resource('mealtype', \App\Http\Controllers\Admin\MealTypeController::class);
    Route::resource('maintype', \App\Http\Controllers\Admin\MealTypeController::class);
    Route::resource('preferedtime', \App\Http\Controllers\Admin\PreferedTimeController::class);
    Route::resource('food', \App\Http\Controllers\Admin\FoodController::class);
    Route::resource('dish', \App\Http\Controllers\Admin\DishController::class);
    Route::resource('ingredient', \App\Http\Controllers\Admin\IngredientController::class);
    Route::resource('staticpages', \App\Http\Controllers\Admin\StaticPagesController::class);
    Route::resource('faq', \App\Http\Controllers\Admin\FaqController::class);
    Route::resource('coupon', \App\Http\Controllers\Admin\CouponController::class);
    Route::resource('subscription', \App\Http\Controllers\Admin\SubscriptionController::class);
    Route::resource('paymentmethod', \App\Http\Controllers\Admin\PaymentMethodController::class);
});

Route::group(['prefix' => 'helper', 'as' => 'helper.'], function () {

    Route::get('user_addresses/{user_id}', [\App\Http\Controllers\Admin\HelperController::class, 'user_addresses'])->name('user_addresses');
    Route::get('diet_day_numbers/{diet_id}', [\App\Http\Controllers\Admin\HelperController::class, 'diet_day_numbers'])->name('diet_day_numbers');
    Route::get('diet_meal_numbers/{diet_id}', [\App\Http\Controllers\Admin\HelperController::class, 'diet_meal_numbers'])->name('diet_meal_numbers');
});
