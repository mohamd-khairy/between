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
            'photo' => 'Photo'
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
            'target' => 'Target',
            'fats' => 'Fats',
            'calories' => 'Calories',
            'weight_from' => 'Weight From',
            'weight_to' => 'Weight To'
        ]
    ],
    'daynumber' => [
        'title' => 'Diet Day Numbers',
        'create' => 'Create Day Numbers',
        'update' => 'Update Day Numbers',
        'fields' => [
            'id' => 'Id',
            'number' => 'Day Numbers',
            'diet' => 'Diet'
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
            'verify' => 'Verify'
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
    'city' => [
        'title' => 'city',
        'create' => 'Create city',
        'update' => 'Update city',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'state' => 'State'
        ]
    ],
    'mealnumber' => [
        'title' => 'Diet meal Numbers',
        'create' => 'Create meal Numbers',
        'update' => 'Update meal Numbers',
        'fields' => [
            'id' => 'Id',
            'number' => 'meal Numbers',
            'price' => 'Price',
            'diet' => 'Diet'
        ]
    ],
    'preferedtime' => [
        'title' => 'Prefered Time',
        'create' => 'Create Prefered Time',
        'update' => 'Update Prefered Time',
        'fields' => [
            'id' => 'Id',
            'from' => 'From',
            'to' => 'To'
        ]
    ],
    'food' => [
        'title' => 'Foods',
        'create' => 'Create Food',
        'update' => 'Update Food',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'details' => 'Details',
            'protein' => 'Protein',
            'carb' => 'Carbohydrate',
            'mealtypes' => 'Meal types',
            'fats' => 'Fats',
            'price' => 'Price',
            'main_type' => 'Main Type',
            'breakfast' => 'Breakfast',
            'dinner' => 'Dinner',
            'launch' => 'Launch',
            'other' => 'Other',
            'photo' => 'Photo',
            'calories' => 'Calories',
            'weight' => 'Weight',
            'type' => 'Type'
        ]
    ],
];
