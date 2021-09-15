<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Models\Food;
use App\Models\MealType;
use Illuminate\Http\Request;

class FoodController extends MainController
{
    public $model = Food::class;
    public $view = 'foods';
    public $route = 'food';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'details_en' => 'required',
        'details_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'fats' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'details_en' => 'required',
        'details_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'target_id' => 'required|exists:targets,id',
        'fats' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
            'MealType' => MealType::all()
        ];
    }
}
