<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Diet;
use App\Models\Coupon;
use App\Models\Food;
use Illuminate\Http\Request;

class CouponController extends MainController
{
    public $model = Coupon::class;
    public $view = 'coupons';
    public $route = 'coupon';
    public $create_validation = [
        'code' => 'required|min:4',
        'discount' => 'required|min:1',
        'type' => 'required',
        'food_id' => 'nullable',
        'start_date' => 'required|after_or_equal:today',
        'end_date' => 'required|after_or_equal:start_date'
    ];
    public $edit_validation = [
        'code' => 'required|min:4',
        'discount' => 'required|min:1',
        'type' => 'required',
        'food_id' => 'nullable',
        'start_date' => 'required',
        'end_date' => 'required|after_or_equal:start_date'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = ['food'];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [
            'foods' => Food::get()
        ];
    }
}
