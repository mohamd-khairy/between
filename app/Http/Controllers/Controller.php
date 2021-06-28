<?php

namespace App\Http\Controllers;

use App\Http\Traits\HelperTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use HelperTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->get($this->model, []);
        return view('admin.' . $this->view . '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.' . $this->view . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate($this->create_validation);
        unset($data['_token']);
        $data = translated_fields($this->model, $data);
        $data = $this->add($this->model, $data);
        session()->flash('success', __('cruds.created_success'));
        return redirect()->route('admin.target.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->find($this->model, ['id' => $id]);
        return view('admin.' . $this->view . '.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->find($this->model, ['id' => $id]);
        return view('admin.' . $this->view . '.edit', compact('data'));
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
        $data = $request->all();
        $request->validate($this->edit_validation);
        unset($data['_token']);
        unset($data['_method']);
        $data = translated_fields($this->model, $data);
        $data = $this->put($this->model, ['id' => $id], $data);
        session()->flash('success', __('cruds.updated_success'));
        return redirect()->route('admin.target.index');
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
        session()->flash('success', __('cruds.deleted_success'));
        return redirect()->route('admin.target.index');
    }
}
