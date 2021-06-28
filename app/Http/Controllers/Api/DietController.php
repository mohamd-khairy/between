<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class DietController extends MainController
{
    public $model = Diet::class;
    public $view = 'diets';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'target_id' => 'required|exists:targets,id',
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'target_id' => 'required|exists:targets,id',
    ];
}
