<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends MainController
{
    public $model = Faq::class;
    public $view = 'faqs';
    public $route = 'faq';
    public $create_validation = [
        'question_en' => 'required',
        'question_ar' => 'required',
        'answer_en' => 'required',
        'answer_ar' => 'required'
    ];
    public $edit_validation = [
        'question_en' => 'required',
        'question_ar' => 'required',
        'answer_en' => 'required',
        'answer_ar' => 'required'
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
