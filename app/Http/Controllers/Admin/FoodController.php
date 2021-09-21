<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Models\Dish;
use App\Models\Food;
use App\Models\FoodType;
use App\Models\MealType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends MainController
{
    public $model = Food::class;
    public $view = 'foods';
    public $route = 'food';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'details_en' => 'required',
        'details_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'fats' => 'required',
        'calories' => 'required',
        'weight' => 'required',
        'price' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'details_en' => 'required',
        'details_ar' => 'required',
        'protein' => 'required',
        'carb' => 'required',
        'fats' => 'required',
        'calories' => 'required',
        'weight' => 'required',
        'price' => 'required',
        'photo'   => 'nullable|image|max:2048'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
            'MealType' => MealType::all(),
            'dishs' => Dish::all()
        ];
    }

    public function store(Request $request)
    {
        if (!request()->expectsJson()) {
            $data = $request->validate($this->create_validation);
        } else {
            $data = $request->all();
            $validateData = Validator::make($data, $this->create_validation);
            if ($validateData->fails()) {
                return responseFail($validateData->errors()->first());
            }
        }
        $data = translated_fields($this->model, $data);
        $data = $this->add($this->model, $data);

        if ($request->meal_type_id) {
            $data->mealtypes()->sync($request->meal_type_id);
        }

        if ($request->type) {
            foreach ($request->type as $key => $value) {
                FoodType::create([
                    'food_id' => $data->id,
                    'dish_id' => $value
                ]);
            }
        }

        if (!request()->expectsJson()) {
            session()->flash('success', __('cruds.created_success'));
            return redirect()->route('admin.' . $this->route . '.index');
        } else {
            return responseSuccess($data, __('cruds.created_success'));
        }
    }


    public function update(Request $request, $id)
    {
        if ($request->phone) {
            $this->edit_validation['phone'] = 'required|unique:users,phone,' . $id;
        }
        if ($request->email) {
            $this->edit_validation['email'] = 'required|email|unique:users,email,' . $id;
        }
        if (!request()->expectsJson()) {
            $data = $request->validate($this->edit_validation);
        } else {
            $data = $request->all();
            $validateData = Validator::make($data, $this->edit_validation);
            if ($validateData->fails()) {
                return responseFail($validateData->errors()->first());
            }
        }

        $food = Food::find($id);
        $data = translated_fields($this->model, $data);
        $data = $this->put($this->model, ['id' => $id], $data);

        if ($request->meal_type_id) {
            $food->mealtypes()->sync($request->meal_type_id);
        }

        if ($request->type && count($request->type) > 0) {
            FoodType::where('food_id', $id)->delete();
            foreach ($request->type as $key => $value) {
                FoodType::create([
                    'food_id' => $id,
                    'dish_id' => $value
                ]);
            }
        }


        if (!request()->expectsJson()) {
            session()->flash('success', __('cruds.updated_success'));
            return redirect()->route('admin.' . $this->route . '.index');
        } else {
            return responseSuccess($data, __('cruds.updated_success'));
        }
    }
}
