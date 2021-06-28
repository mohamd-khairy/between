<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
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
