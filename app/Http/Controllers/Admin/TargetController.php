<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends MainController
{
    public $model = Target::class;
    public $view = 'targets';
    public $route = 'target';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'photo'   => 'required|image|max:2048'
    ];
    public $view_fields = [];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->view_fields = [
            'crud_name' => 'target',
            'crud_route' => 'target',
            'fields' => [
                'row' => [
                    'translated' => [
                        'name' => 'name',
                        'display_name' => __('cruds.target.fields.name'),
                    ],
                    'col' => 6,
                    'items' => [
                        'name_en' => [
                            'type' => 'text',
                            'id' => 'name_en',
                            'name' => 'name_en',
                            'display_name' => __('cruds.target.fields.name') . ' En',
                            'required' => 1
                        ],
                        'name_ar' => [
                            'type' => 'text',
                            'id' => 'name_ar',
                            'name' => 'name_ar',
                            'display_name' => __('cruds.target.fields.name') . ' Ar',
                            'required' => 1
                        ]
                    ]
                ],
                'photo' => [
                    'type' => 'file',
                    'id' => 'photo',
                    'name' => 'photo',
                    'display_name' => __('cruds.target.fields.photo'),
                    'required' => 0
                ]
            ]
        ];

        $this->create_data = $this->edit_data = [];
    }
}
