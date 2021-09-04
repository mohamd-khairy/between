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
        'name_ar' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'photo'   => 'required|image|max:2048'
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
