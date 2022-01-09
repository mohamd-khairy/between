<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\PaymentMethod;
use App\Models\State;
use Illuminate\Http\Request;

class PaymentMethodController extends MainController
{
    public $model = PaymentMethod::class;
    public $view = 'paymentmethods';
    public $route = 'paymentmethod';
    public $create_validation = [
        'key' => 'required|string',
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'status' => 'required|boolean'
    ];
    public $edit_validation = [
        'key' => 'required|string',
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'status' => 'required|boolean'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->create_data = $this->edit_data = [];
    }
}
