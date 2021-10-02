<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Diet;
use App\Models\MealNumber;
use Illuminate\Http\Request;

class MealNumberController extends MainController
{
    public $model = MealNumber::class;
    public $view = 'mealnumbers';
    public $route = 'mealnumber';
    public $create_validation = [
        'number' => 'required',
        'price' => 'required',
        'diet_id' => 'required'
    ];
    public $edit_validation = [
        'number' => 'required',
        'price' => 'required',
        'diet_id' => 'required'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = ['diet'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
            'diets' => Diet::get()
        ];
    }
}
