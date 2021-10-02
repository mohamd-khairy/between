<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends MainController
{
    public $model = City::class;
    public $view = 'cities';
    public $route = 'city';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'state_id' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'state_id' => 'required'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = ['state'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }

    public function create()
    {
        $states = State::get();
        return view('admin.' . $this->view . '.create', compact('states'));
    }

    public function edit($id)
    {
        $states = State::get();
        $data = $this->findWith($this->model, ['id' => $id], $this->with);
        return view('admin.' . $this->view . '.edit', compact('data', 'states'));
    }
}
