<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\DayNumber;
use Illuminate\Http\Request;

class DayNumberController extends MainController
{
    public $model = DayNumber::class;
    public $view = 'daynumbers';
    public $route = 'daynumber';
    public $create_validation = [
        'number' => 'required',
    ];
    public $edit_validation = [
        'number' => 'required',
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
}
