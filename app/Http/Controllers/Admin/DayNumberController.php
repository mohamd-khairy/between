<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\DayNumber;
use App\Models\Diet;
use Illuminate\Http\Request;

class DayNumberController extends MainController
{
    public $model = DayNumber::class;
    public $view = 'daynumbers';
    public $route = 'daynumber';
    public $create_validation = [
        'number' => 'required',
        'diet_id' => 'required'
    ];
    public $edit_validation = [
        'number' => 'required',
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
