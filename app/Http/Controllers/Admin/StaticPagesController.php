<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPagesController extends MainController
{
    public $model = StaticPage::class;
    public $view = 'static_pages';
    public $route = 'staticpages';
    public $create_validation = [
        'body_en' => 'required',
        'body_ar' => 'required',
        'name' => 'required'
    ];
    public $edit_validation = [
        'body_en' => 'required',
        'body_ar' => 'required',
        'name' => 'required'
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
