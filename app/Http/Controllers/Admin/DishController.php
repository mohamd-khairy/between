<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class DishController extends MainController
{
    public $model = Dish::class;
    public $view = 'dishs';
    public $route = 'dish';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }
}
