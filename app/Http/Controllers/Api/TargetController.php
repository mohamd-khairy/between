<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class TargetController extends MainController
{
    public $model = Target::class;
    public $view = 'targets';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
}
