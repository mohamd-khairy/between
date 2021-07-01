<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends MainController
{
    public $model = Target::class;
    public $view = 'targets';
    public $route = 'target';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    public $indexCondition = [];
    public $with = [];

}
