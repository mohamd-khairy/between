<?php

return [
    'assign' => 'تخصيص',
    'add' => 'اضافه',
    'create' => 'انشاء',
    'view' => 'مشاهده',
    'edit' => 'تعديل',
    'delete' => 'حذف',
    'value' => 'القيمه',
    'sure' => 'Are You Sure?',
    'id' => 'رقم',
    'select_all' => 'اختر-الكل',
    'deselect_all' => 'امسح-الكل',
    'actions' => 'انشطه',
    'male' => 'ذكر',
    'female' => 'أنثي',
    'user' => 'مستخدم',
    'admin' => 'أدمن',
    'home' => 'المنزل',
    'work' => 'العمل',

    'deleted_success' => 'تم المسح بنجاح',
    'created_success' => 'تم الانشاء بنجاح',
    'updated_success' => 'تم التعديل',

    'deleted_fail' => 'فشل المسح',
    'created_fail' => 'فشل الانشاء',
    'updated_fail' => 'فشل التعديل',

    'target' => [
        'title' => 'الاهداف',
        'create' => 'انشاء هدف',
        'update' => 'تعديل هدف',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
        ]
    ],
    'diet' => [
        'title' => 'النظام',
        'create' => 'انشاء نظام',
        'update' => 'تعديل نظام',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
            'protein' => 'البروتين',
            'carb' => 'الكربوهيدرات',
            'target' => 'الهدف'
        ]
    ],
    'daynumber' => [
        'title' => 'ايام المتابعه',
        'create' => ' اضافه عدد ',
        'update' => ' تعديل عدد',
        'fields' => [
            'id' => 'الرقم',
            'number' => 'عدد الايام',
        ]
    ],
    'state' => [
        'title' => 'الامارات',
        'create' => 'انشاء اماره',
        'update' => 'تعديل اماره',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
        ]
    ],
    'users' => [
        'title' => 'المستخدمين',
        'create' => 'انشاء مستخدم',
        'update' => 'تعديل مستخدم',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'password' => 'كلمه المرور',
            'type' => 'النوع',
            'phone' => 'رقم التليفون',
            'weight' => 'الوزن',
            'height' => 'الطول',
            'gender' => 'الجنس',
            'birth_date' => 'تاريخ الميلاد',
            'verify' => 'التحقق'

        ]
    ],
    'address' => [
        'title' => 'العناوين',
        'create' => 'انشاء عنوان',
        'update' => 'تعديل عنوان',
        'fields' => [
            'id' => 'الرقم',
            'country' => 'البلد',
            'state' => 'الاماره',
            'full_address' => 'العنوان',
            'district' => 'المنطقه',
            'building' => 'المبني',
            'floor' => 'الطابق',
            'apartment_number' => ' الوحده',
            'type' => 'النوع',
            'street' => 'الشارع',
            'user' => 'المستخدم',
        ]
    ],

    'mealtype' => [
        'title' => 'الانواع',
        'create' => 'انشاء نوع',
        'update' => 'تعديل نوع',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
            'main_type' => 'النوع الاساسي'
        ]
    ],
    'city' => [
        'title' => 'المدن',
        'create' => 'انشاء مدينه',
        'update' => 'تعديل مدينه',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
            'state' => 'الاماره'
        ]
    ],
];
