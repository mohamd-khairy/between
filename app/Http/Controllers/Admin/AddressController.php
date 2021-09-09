<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Address;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends MainController
{
    public $model = Address::class;
    public $view = 'addresses';
    public $route = 'address';
    public $create_validation = [
        'user_id' => 'required|exists:users,id',
        'state_id' => 'required|exists:states,id',
        'district_en' => 'required',
        'district_ar' => 'required',
        'street_en' => 'required',
        'street_ar' => 'required',
        'building' => 'required',
        'floor' => 'required',
        'apartment_number' => 'required',
        'type' => 'required|in:home,work'
    ];
    public $edit_validation = [
        'user_id' => 'required|exists:users,id',
        'state_id' => 'required|exists:states,id',
        'district_en' => 'required',
        'district_ar' => 'required',
        'street_en' => 'required',
        'street_ar' => 'required',
        'building' => 'required',
        'floor' => 'required',
        'apartment_number' => 'required',
        'type' => 'required|in:home,work',
    ];
    public $filters = ['user_id'];
    public $indexCondition = [];
    public $with = ['user'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }
    
    public function create()
    {
        $users = User::where('type', 'user')->get();
        $states = State::get();
        return view('admin.' . $this->view . '.create', compact('users', 'states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->create_validation);
        $state = State::find($request->state_id);
        $data['state_en'] = $state->translate('en')->name;
        $data['state_ar'] = $state->translate('ar')->name;
        $data['country_en'] = 'United Arab Emirates';
        $data['country_ar'] = 'الإمارات العربية المتحدة';
        $data['full_address_en'] = $data['street_en'] . '-' . $data['district_en'] . '-' . $data['state_en'] . '-' . $data['country_en'];
        $data['full_address_ar'] = $data['street_ar'] . '-' . $data['district_ar'] . '-' . $data['state_ar'] . '-' . $data['country_ar'];
        $data = translated_fields($this->model, $data);
        $data = $this->add($this->model, $data);
        session()->flash('success', __('cruds.created_success'));
        return redirect()->route('admin.' . $this->route . '.index');
    }


    public function edit($id)
    {
        $users = User::where('type', 'user')->get();
        $states = State::get();
        $data = $this->findWith($this->model, ['id' => $id], []);
        return view('admin.' . $this->view . '.edit', compact('data', 'users', 'states'));
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
        $data = $request->validate($this->edit_validation);
        $address = Address::find($id);
        $state = State::find($request->state_id);
        $data['state_en'] = $state->translate('en')->name;
        $data['state_ar'] = $state->translate('ar')->name;
        $data['country_en'] = $address->translate('en')->country;
        $data['country_ar'] = $address->translate('ar')->country;
        $data['full_address_en'] = $data['street_en'] . '-' . $data['district_en'] . '-' . $data['state_en'] . '-' . $data['country_en'];
        $data['full_address_ar'] = $data['street_ar'] . '-' . $data['district_ar'] . '-' . $data['state_ar'] . '-' . $data['country_ar'];
        $data = translated_fields($this->model, $data);
        $data = $this->put($this->model, ['id' => $id], $data);
        session()->flash('success', __('cruds.updated_success'));
        return redirect()->route('admin.' . $this->route . '.index');
    }
}
