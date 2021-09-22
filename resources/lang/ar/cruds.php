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
            'photo' => 'الصوره'
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
            'target' => 'الهدف',
            'fats' => 'الدهون',
            'calories' => 'سعرات',
            'weight_from' => 'الوزن من',
            'weight_to' => 'الوزن الي'
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
            'diet' => 'النظام'
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
    'mealnumber' => [
        'title' => 'عدد الوجبات في اليوم',
        'create' => 'انشاء عدد وجبات',
        'update' => 'تعديل عدد وجبات',
        'fields' => [
            'id' => 'الرقم',
            'number' => 'عدد الوجبات',
            'price' => 'السعر',
            'diet' => 'الدايت'
        ]
    ],
    'preferedtime' => [
        'title' => 'الاوقات المفضله',
        'create' => 'انشاء وقت مفضل',
        'update' => 'تعديل وقت مفضل',
        'fields' => [
            'id' => 'الرقم',
            'from' => 'من',
            'to' => 'الي'
        ]
    ],
    'food' => [
        'title' => 'الوجبات',
        'create' => 'انشاء وجبه',
        'update' => 'تعديل وجبه',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
            'diet' => 'التفاصيل',
            'protein' => 'البروتين',
            'carb' => 'الكربوهيدرات',
            'mealtypes' => 'انواع الوجبات',
            'fats' => 'الدهون',
            'price' => 'السعر',
            'main_type' => 'النوع الاساسي',
            'breakfast' => 'الفطار',
            'dinner' => 'الغداء',
            'launch' => 'العشاء',
            'other' => 'اخري',
            'photo' => 'الصوره',
            'calories' => 'سعرات',
            'weight' => 'الوزن ',
            'type' => 'النوع',
            'ingredients' => 'الحساسيه'
        ]
    ],

    'dish' => [
        'title' => 'الانواع',
        'create' => 'انشاء طبق',
        'update' => 'تعديل طبق',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
        ]
    ],

    'ingredient' => [
        'title' => 'الحساسيه',
        'create' => 'انشاء حساسيه',
        'update' => 'تعديل حساسيه',
        'fields' => [
            'id' => 'الرقم',
            'name' => 'الاسم',
        ]
    ],
];
