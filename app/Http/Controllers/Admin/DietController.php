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
        'target_id' => 'required|exists:targets,id',
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'target_id' => 'required|exists:targets,id',
    ];

    public $with = ['target'];

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
