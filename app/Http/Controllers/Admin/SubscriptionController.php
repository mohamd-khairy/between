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
        'user_id' => 'required|exists:users,id',
        'ingredient_ids' => 'nullable|array',
        'ingredient_ids.*' => 'nullable|exists:ingredients,id',
        'protien_ids' => 'required|array',
        'protien_ids.*' => 'required|exists:meal_types,id',
        'snack_ids' =>  'required|array',
        'snack_ids.*' =>  'required|exists:meal_types,id',
        'carb_ids' =>  'required|array',
        'carb_ids.*' =>  'required|exists:meal_types,id',
        'target_id' => 'required|exists:targets,id',
        'meal_number_id' => 'required|exists:meal_numbers,id',
        'day_number_id' => 'required|exists:day_numbers,id',
        'prefered_time_id' => 'required|exists:prefered_times,id',
        'dish_id' => 'required|exists:dishes,id',
        'diet_id' => 'required|exists:diets,id',
        'address_id' => 'required|exists:addresses,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date'

    ];
    public $edit_validation = [
        'user_id' => 'required|exists:users,id',+
        'ingredient_ids' => 'nullable|array',
        'ingredient_ids.*' => 'nullable|exists:ingredients,id',
        'protien_ids' => 'required|array',
        'protien_ids.*' => 'required|exists:meal_types,id',
        'snack_ids' =>  'required|array',
        'snack_ids.*' =>  'required|exists:meal_types,id',
        'carb_ids' =>  'required|array',
        'carb_ids.*' =>  'required|exists:meal_types,id',
        'target_id' => 'required|exists:targets,id',
        'meal_number_id' => 'required|exists:meal_numbers,id',
        'day_number_id' => 'required|exists:day_numbers,id',
        'prefered_time_id' => 'required|exists:prefered_times,id',
        'dish_id' => 'required|exists:dishes,id',
        'diet_id' => 'required|exists:diets,id',
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
            'ingredients' => Ingredient::all(),
            'proteins' => MealType::where('parent_id', MealType::MainTypes['protein'])->get(),
            'carbs' => MealType::where('parent_id', MealType::MainTypes['carb'])->get(),
            'snacks' => MealType::where('parent_id', MealType::MainTypes['snacks'])->get(),
            'targets' => Target::get(),
            'prefered_times' => PreferedTime::all(),
            'dishs' => Dish::all(),
            'diets' => Diet::all(),
        ];
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
