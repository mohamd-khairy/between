<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends MainController
{
    public $model = State::class;
    public $view = 'states';
    public $route = 'state';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
}
