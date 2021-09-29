<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends MainController
{
    public $model = City::class;
    public $view = 'cities'; //general
    public $route = 'city';
    public $create_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'state_id' => 'required'
    ];
    public $edit_validation = [
        'name_en' => 'required',
        'name_ar' => 'required',
        'state_id' => 'required'
    ];
    public $filters = [];
    public $indexCondition = [];
    public $with = [];
    public $create_data = [];
    public $edit_data = [];

    public function __construct()
    {
        $this->view_fields = [
            'crud_name' => 'city',
            'crud_route' => 'city',
            'fields' => [
                'row' => [
                    'translated' => [
                        'name' => 'name',
                        'display_name' => __('cruds.city.fields.name'),
                    ],
                    'col' => 6,
                    'items' => [
                        'name_en' => [
                            'type' => 'text',
                            'id' => 'name_en',
                            'name' => 'name_en',
                            'display_name' => __('cruds.city.fields.name') . ' En',
                            'required' => 1
                        ],
                        'name_ar' => [
                            'type' => 'text',
                            'id' => 'name_ar',
                            'name' => 'name_ar',
                            'display_name' => __('cruds.city.fields.name') . ' Ar',
                            'required' => 1
                        ]
                    ]
                ],
                'select' => [
                    'type' => 'select',
                    'relation' => [
                        'name' => 'state',
                        'item_name' => 'name'
                    ],
                    'id' => 'state_id',
                    'name' => 'state_id',
                    'display_name' => __('cruds.city.fields.state'),
                    'required' => 1
                ]
            ]
        ];

        $this->create_data = $this->edit_data = [
            'state' => State::get()
        ];
    }
}
