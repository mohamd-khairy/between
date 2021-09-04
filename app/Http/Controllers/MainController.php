<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\HelperTrait;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = $this->filters($this->filters) + $this->indexCondition;
        // $conditions = count($this->filters($this->filters)) > 0 ? $this->filters($this->filters) : $this->indexCondition;
        $data = $this->getBy($this->model, $conditions, $this->with);
        if (!request()->expectsJson()) {
            return view('admin.' . $this->view . '.index', compact('data'));
        } else {
            return responseSuccess($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.' . $this->view . '.create')->with('allData', $this->create_data ?? []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $data = $this->add($this->model, $data);

        // if ($request->image) {
        //     $image = upload_image($request->image, $this->route);
        //     Image::create(['photo' => $image, 'item_id' => $data->id, 'model' => $this->route]);
        // }

        if (!request()->expectsJson()) {
            session()->flash('success', __('cruds.created_success'));
            return redirect()->route('admin.' . $this->route . '.index');
        } else {
            return responseSuccess($data, __('cruds.created_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->findWith($this->model, ['id' => $id], $this->with);
        if (!request()->expectsJson()) {
            return view('admin.' . $this->view . '.show', compact('data'));
        } else {
            return responseSuccess($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->findWith($this->model, ['id' => $id], $this->with);
        return view('admin.' . $this->view . '.edit', compact('data'))->with('allData', $this->edit_data ?? []);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $data = translated_fields($this->model, $data);

        if ($request->password && $request->password != null) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        if (isset($request->verify)) {
            $data['email_verified_at'] = $request->verify == 1 ? now() : null;
        }

        $data = $this->put($this->model, ['id' => $id], $data);

        // if ($request->image) {
        //     $image = upload_image($request->image, $this->route);
        //     $old = Image::where(['item_id' => $data->id])->first();
        //     delete_image($old->photo);
        //     $old->update(['photo' => $image]);
        // }

        if (!request()->expectsJson()) {
            session()->flash('success', __('cruds.updated_success'));
            return redirect()->route('admin.' . $this->route . '.index');
        } else {
            return responseSuccess($data, __('cruds.updated_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->delete($this->model, ['id' => $id]);
        if (!request()->expectsJson()) {
            session()->flash('success', __('cruds.deleted_success'));
            return redirect()->route('admin.' . $this->route . '.index');
        } else {
            return responseSuccess($data, __('cruds.deleted_success'));
        }
    }
}
