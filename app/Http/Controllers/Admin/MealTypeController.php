<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MealType;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class MealTypeController extends MainController
{
    public $model = MealType::class;
    public $view = 'mealtypes';
    public $route = 'mealtype';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'parent' => 'required',
        'parent_id' => 'required_if:parent,0',
        'photo' => 'required|image|max:2048'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'parent' => 'required',
        'parent_id' => 'required_if:parent,0',
        'photo' => 'nullable|image|max:2048'
    ];
    public $filters = ['parent'];
    public $indexCondition = ['parent' => 0];
    public $with = ['main_type'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }

    public function create()
    {
        $main_types = MealType::where('parent', 1)->get();
        $parent = request('parent') ?? 0;
        return view('admin.' . $this->view . '.create', compact('parent', 'main_types'));
    }

    public function edit($id)
    {
        $parent = request('parent') ?? 0;
        $main_types = MealType::where('parent', 1)->get();
        $data = $this->findWith($this->model, ['id' => $id], $this->with);
        return view('admin.' . $this->view . '.edit', compact('data', 'parent', 'main_types'));
    }


    public function store(Request $request)
    {
        $data = $request->validate($this->create_validation);
        $data = translated_fields($this->model, $data);
        $data = $this->add($this->model, $data);
        session()->flash('success', __('cruds.created_success'));
        if ($data['parent'] == 1) {
            return redirect()->route('admin.maintype.index', ['parent' => 1]);
        }
        return redirect()->route('admin.' . $this->route . '.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->edit_validation);
        $data = translated_fields($this->model, $data);
        $data = $this->put($this->model, ['id' => $id], $data);

        session()->flash('success', __('cruds.updated_success'));
        if ($request->parent == 1) {
            return redirect()->route('admin.maintype.index', ['parent' => 1]);
        }
        return redirect()->route('admin.' . $this->route . '.index');
    }

    public function destroy($id)
    {
        $data = $this->delete($this->model, ['id' => $id]);
        session()->flash('success', __('cruds.deleted_success'));
        if ($data['parent'] == 1) {
            return redirect()->route('admin.maintype.index', ['parent' => 1]);
        }
        return redirect()->route('admin.' . $this->route . '.index');
    }
}
