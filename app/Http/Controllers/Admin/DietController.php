<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Models\Diet;
use App\Models\Target;
use Illuminate\Http\Request;

class DietController extends MainController
{
    public $model = Diet::class;
    public $view = 'diets';
    public $route = 'diet';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'fats' => 'required',
        'target_id' => 'required|exists:targets,id',
        'photo'   => 'required|image|max:2048',
        'calories' => 'required',
        'weight_from' => 'required',
        'weight_to' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'target_id' => 'required|exists:targets,id',
        'fats' => 'required',
        'photo'   => 'nullable|image|max:2048',
        'calories' => 'required',
        'weight_from' => 'required',
        'weight_to' => 'required'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = ['target'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }

    public function create()
    {
        $targets = Target::all();
        return view('admin.' . $this->view . '.create', compact('targets'));
    }

    public function edit($id)
    {
        $targets = Target::all();
        $data = $this->findWith($this->model, ['id' => $id], ['target']);
        return view('admin.' . $this->view . '.edit', compact('data', 'targets'));
    }
}
