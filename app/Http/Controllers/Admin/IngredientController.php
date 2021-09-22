<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Models\Ingredient;

class IngredientController extends MainController
{
    public $model = Ingredient::class;
    public $view = 'ingredients';
    public $route = 'ingredient';
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
