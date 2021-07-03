<?php

return [
    'assign' => 'Assign new',
    'add' => 'Add',
    'create' => 'Create',
    'view' => 'View',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'value' => 'Value',
    'sure' => 'Are You Sure?',
    'id' => 'number',
    'select_all' => 'select-all',
    'deselect_all' => 'Deselect-all',
    'actions' => 'Actions',
    'male' => 'Male',
    'female' => 'Female',
    'user' => 'User',
    'admin' => 'Admin',

    'home' => 'Home',
    'work' => 'Work',

    'deleted_success' => 'Deleted Successfully',
    'created_success' => 'Created Successfully',
    'updated_success' => 'Updated Successfully',

    'deleted_fail' => 'Deleted Fail',
    'created_fail' => 'Created Fail',
    'updated_fail' => 'Updated Fail',

    'target' => [
        'title' => 'Target',
        'create' => 'Create Target',
        'update' => 'Update Target',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
        ]
    ],
    'diet' => [
        'title' => 'Diet',
        'create' => 'Create Diet',
        'update' => 'Update Diet',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'protein' => 'Protein',
            'carb' => 'Carbohydrate',
            'target' => 'Target'
        ]
    ],
    'daynumber' => [
        'title' => 'Subscription Day Numbers',
        'create' => 'Create Subscription Day Numbers',
        'update' => 'Update Subscription Day Numbers',
        'fields' => [
            'id' => 'Id',
            'number' => 'Day Numbers',
        ]
    ],
    'state' => [
        'title' => 'state',
        'create' => 'Create state',
        'update' => 'Update state',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
        ]
    ],
    'users' => [
        'title' => 'Users',
        'create' => 'Create user',
        'update' => 'Update user',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'type' => 'Type',
            'phone' => 'Phone',
            'weight' => 'Weight',
            'height' => 'Height',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
        ]
    ],
    'address' => [
        'title' => 'Addresses',
        'create' => 'Create Address',
        'update' => 'Update Address',
        'fields' => [
            'id' => 'Id',
            'country' => 'Country',
            'state' => 'State',
            'full_address' => 'Full Address',
            'district' => 'District',
            'building' => 'Building',
            'floor' => 'Floor',
            'apartment_number' => 'Apartment Number',
            'type' => 'Type',
            'street' => 'Street',
            'user' => 'User',
        ]
    ],
    'mealtype' => [
        'title' => 'Types',
        'create' => 'Create Type',
        'update' => 'Update Type',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'main_type' => 'Main Type'
        ]
    ],
];
