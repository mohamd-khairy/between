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

    'status' => [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'on_delivery' => 'On Delivery',
        'complete' => 'Complete',
        'cancel' => 'Cancel'
    ],
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
            'type' => 'Type',
            'ingredients' => 'Ingredients',
            'status' => 'Status'
        ]
    ],

    'dish' => [
        'title' => 'Dishs',
        'create' => 'Create Dish',
        'update' => 'Update Dish',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
        ]
    ],

    'ingredient' => [
        'title' => 'Ingredients',
        'create' => 'Create ingredient',
        'update' => 'Update ingredient',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
        ]
    ],

    'staticpages' => [
        'title' => 'staticpages',
        'create' => 'Create staticpage',
        'update' => 'Update staticpage',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'body_en' => 'Body English',
            'body_ar' => 'Body Arabic',
        ]
    ],
    'faq' => [
        'title' => 'faq',
        'create' => 'Create faq',
        'update' => 'Update faq',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'question' => 'question',
            'answer' => 'answer',
            'question_en' => 'question English',
            'question_ar' => 'question Arabic',
            'answer_en' => 'answer English',
            'answer_ar' => 'answer Arabic',
        ]
    ],
    'coupon' => [
        'title' => 'coupon',
        'create' => 'Create coupon',
        'update' => 'Update coupon',
        'fields' => [
            'id' => 'Id',
            'name' => 'Name',
            'code' => 'code',
            'discount' => 'discount',
            'food' => 'Food',
            'type' => 'type',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'cash' => 'Cash',
            'percentage' => 'Percentage'
        ]
    ],
    'subscription' => [
        'title' => 'subscription',
        'create' => 'Create subscription',
        'update' => 'Update subscription',
        'fields' => [
            'id' => 'Id',
            'users' => 'users',
            'name' => 'Name',
            'code' => 'code',
            'dish' => 'Dish',
            'mealtypes' => 'mealtypes',
            'ingredients' => 'ingredients',
            'type' => 'type',
            'proteins' => 'protein',
            'carbs' => 'carb',
            'fats' => 'fats',
            'snacks' => 'snacks',
            'calories' => 'calories',
            'weight' => 'weight',
            'price' => 'price',
            'photo' => 'photo',
            'status' => 'status',
            'total' => 'total',
            'diet' => 'Diet',
            'prefered_times' => 'prefered times',
            'start_date' => 'Start date',
            'end_date' => 'end date',
            'meal_numbers' => 'meal numbers',
            'day_numbers' => 'day numbers',
            'order_number' => 'Order Number'
        ]
    ],
];
