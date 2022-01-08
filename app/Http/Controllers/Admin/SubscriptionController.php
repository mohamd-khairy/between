<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Address;
use App\Models\DayNumber;
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
    ];
    public $edit_validation = [
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
        $data = $request->validate($this->create_validation);
        $user = User::find($request->user_id);
        $meal_number = MealNumber::find($request->meal_number_id);
        $day_number = DayNumber::find($request->day_number_id);

        /******* prepare data *******/
        $data = $request->all();
        $data['weight'] = $user->weight;
        $data['height'] = $user->height;
        $data['gender'] = $user->gender;
        $data['user_id'] = $user->id;
        $data['status'] = 'in_progress';
        $data['delivery_fees'] = config('delivery_fees', 0) ?? 0;
        $data['package_value'] = ($meal_number->price * $day_number->number) ?? null;
        $data['total'] =  ($data['package_value'] + $data['delivery_fees']) ?? null;

        /******* save data *******/
        $result = $this->add(Subscription::class, $data);
        session()->flash('success', __('cruds.created_success'));
        return redirect()->route('admin.' . $this->route . '.index');
    }
}
