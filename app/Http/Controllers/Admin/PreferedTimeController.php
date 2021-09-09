<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\PreferedTime;
use Illuminate\Http\Request;

class PreferedTimeController extends MainController
{
    public $model = PreferedTime::class;
    public $view = 'preferedtimes';
    public $route = 'preferedtime';
    public $create_validation = [
        'from' => 'required',
        'to' => 'required',
    ];
    public $edit_validation = [
        'from' => 'required',
        'to' => 'required',
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
        ];
    }
}
