<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Address;
use App\Models\Diet;
use App\Models\Dish;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\MealNumber;
use App\Models\MealType;
use App\Models\PreferedTime;
use App\Models\Subscription;
use App\Models\Target;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends MainController
{
    public $model = Subscription::class;
    public $view = 'subscriptions';
    public $route = 'subscription';
    public $create_validation = [
        'ingredient_ids' => 'nullable',
        'protien_ids' => 'nullable',
        'snack_ids' => 'nullable',
        'carb_ids' => 'nullable',
        'target_id' => 'required|exists:targets,id',
        'meal_number_id' => 'required|exists:meal_numbers,id',
        'prefered_time_id' => 'required|exists:prefered_times,id',
        'dish_id' => 'required|exists:dishes,id',
        'diet_id' => 'required|exists:diets,id',
        'address_id' => 'required|exists:addresses,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date'
    ];
    public $edit_validation = [
        'ingredient_ids' => 'nullable',
        'protien_ids' => 'nullable',
        'snack_ids' => 'nullable',
        'carb_ids' => 'nullable',
        'target_id' => 'required|exists:targets,id',
        'meal_number_id' => 'required|exists:meal_numbers,id',
        'prefered_time_id' => 'required|exists:prefered_times,id',
        'dish_id' => 'required|exists:dishes,id',
        'diet_id' => 'nullable|exists:diets,id',
        'address_id' => 'required|exists:addresses,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
            'users' => User::get(),
            'proteins' => MealType::where('parent_id', MealType::MainTypes['protein'])->get(),
            'carbs' => MealType::where('parent_id', MealType::MainTypes['carb'])->get(),
            'snacks' => MealType::where('parent_id', MealType::MainTypes['snacks'])->get(),
            'targets' => Target::get(),
            'ingredients' => Ingredient::all(),
            'prefered_times' => PreferedTime::all(),
            'dishs' => Dish::all(),
            'diets' => Diet::all(),
        ];
    }
}
