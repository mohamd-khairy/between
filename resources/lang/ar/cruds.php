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

    'deleted_success' => 'تم المسح بنجاح',
    'created_success' => 'تم الانشاء بنجاح',
    'updated_success' => 'تم التعديل',

    'deleted_fail' => 'فشل المسح',
    'created_fail' => 'فشل الانشاء',
    'updated_fail' => 'فشل التعديل',

    'permissions' => [
        'create' => 'انشاء صلاحيه',
        'update' => 'تعديل صلاحيه',
        'fields' => [
            'name' => 'الاسم',
            'display_name' => 'الاسم المعروض',
            'description' => 'الوصف',
        ]
    ],
    'roles' => [
        'create' => 'انشاء دور',
        'fields' => [
            'name' => 'الاسم',
            'display_name' => 'الاسم المعروض',
            'description' => 'الوصف',
            'permissions' => 'الصلاحيات',
        ]
    ],
    'employees' => [
        'create' => 'انشاء موظف',
        'update' => 'تعديل موظف',
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'job' => 'الوظيفه',
            'mobile' => 'الموبايل',
            'status' => 'الحاله',
            'role' => 'الدور',
            'image' => 'الصوره',
            'address' => 'العنوان',
            'sallary' => 'السعر',
            'percent'=> 'النسبه ',
            'user_name' => 'اسم المستخدم',
            'random_key' => 'رقم عشوائي',
            'password' => 'الرقم السري',
        ]
    ],
    'villages' => [
        'create' => 'انشاء قريه',
        'update' => 'تعديل قريه',
        'add_employee' => 'اضافه موظف',
        'add_worker' => 'اضافه عامل',
        'fields' => [
            'name' => 'الاسم',
            'mobile' => 'الموبايل',
            'status' => 'الحاله',
            'image' => 'الصوره',
            'address' => 'العنوان',
            'facebook' => 'الفيس بوك',
            'google' => 'جوجل',
            'twitter' => 'تويتر',
            'instagram' => 'انستجرام',
            'youtube' => 'يوتيوب',
            'website' => 'الموقع الاكتروني',
        ]
    ],
    'groups' => [
        'create' => 'انشاء مجموعه',
        'update' => 'تعديل مجموعه',
        'fields' => [
            'name' => 'الاسم',
            'status' => 'الحاله',
            'village' => 'القريه',
            'employee' => 'الموظف',
        ]
    ],
    'chalets' => [
        'create' => 'انشاء شاليه',
        'update' => 'تعديل شاليه',
        'add_owner' => 'اضافه مالك',
        'fields' => [
            'name' => 'الاسم',
            'status' => 'الحاله',
            'group' => 'مجموعه',
            'employee' => 'الموظف',
        ]
    ],
    'workers' => [
        'create' => 'انشاء عامل',
        'update' => 'تعديل عامل',
        'subservices' => 'الخدمات الفرعيه',
        'villages' => 'القري',
        'places' => 'الاماكن',
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'availability' => 'حاله الشغل',
            'mobile' => 'الموبايل',
            'status' => 'الحاله',
            'role' => 'الدور',
            'image' => 'الصوره',
            'address' => 'العنوان',
            'type' => 'النوع',
            'user_name' => 'اسم المستخدم',
            'random_key' => 'رقم عشوائي',
            'password' => 'الرقم السري',
        ]
    ],
    'owners' => [
        'create' => 'انشاء مالك',
        'update' => 'تعديل مالك',
        'chalets' => 'الشاليهات',
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'mobile' => 'الموبايل',
            'status' => 'الحاله',
            'image' => 'الصوره',
            'address' => 'العنوان',
            'user_name' => 'اسم المستخدم',
            'random_key' => 'رقم عشوائي',
            'password' => 'الرقم السري',
        ]
    ],
    'orders' => [
        'create' => 'انشاء طلب',
        'update' => 'تعديل طلب',
        'details' => 'التفاصيل',
        'fields' => [
            'order_number' => 'رقم الطلب',
            'visit_id' => 'رقم الزياره',
            'order_date' => 'تاربخ الطلب',
            'order_time' => 'وقت الطلب',
            'order_status' => 'حاله الطلب',
            'owner_id' => 'رقم المالك',
            'owner_name' => 'اسم المالك',
            'owner_mobile' => 'موبايل المالك',
            'chalet' => 'الشاليه',
            'chalet_id' => 'رقم الشاليه',
            'supervisor' => 'المشرف',
            'supervisor_id' => 'رقم المشرف',
            'supervisor_action' => 'حاله المشرف',
            'supervisor_action_date' => 'تاريخ تغير حاله المشرف',
            'supervisor_action_time' => 'توقيت تغير حاله المشرف',
            'worker' => ' العامل',
            'worker_id' => 'رقم العامل',
            'worker_type' => 'نوع العامل',
            'worker_mobile' => 'موبايل العامل',
            'worker_start_date' => 'تاريخ بدايه العامل',
            'worker_start_time' => 'وقت بدايه العامل',
            'worker_delivered_date' => 'تاريخ وصول العامل',
            'worker_delivered_time' => 'وقت وصول العامل',
            'worker_complete_date' => 'تاريخ انتهاء العامل',
            'worker_complete_time' => 'وقت انتهاء العامل',
            'evaluation_degree' => 'درجه التقييم',
            'evaluation_details' => 'تفاصيل التقييم',
            'evaluation_date' => 'تاريخ التقييم',
            'evaluation_time' => 'وقت التقييم',
            'token' => 'Token',
            'map_long' => 'خطوط العرض',
            'map_lat' => 'خطوط الطول',
            'promo_code_id' => 'رقم العرض',
            'promo_code_percent' => 'نسبه التخفيض',
        ]
    ],
    'details' => [
        'name' => 'تفاصيل الطلب',
        'create' => 'انشاء تفاصيل',
        'update' => 'تعديل التفاصيل',
        'add' => 'اضافه التفاصيل',
        'fields' => [
            'service_name' => 'اسم الخدمه',
            'subservice_name' => 'اسن الخدمه الفرعيه',
            'subservice_details' => 'تفاصيل الخدمه الفرعيه',
            'order_details' => 'تفاصيل الطلب'
        ]
    ],
    'services' => [
        'create' => 'انشاء خدمه',
        'update' => 'تعديل خدمه',
        'fields' => [
            'name' => 'الاسم',
            'image' => 'الصوره',
            'village' => 'القريه',
            'details' => 'التفاصيل'
        ]
    ],
    'subservices' => [
        'create' => 'انشاء خدمه فرعيه',
        'update' => 'تعديل خدمه فرعيه',
        'fields' => [
            'name' => 'الاسم',
            'image' => 'الصوره',
            'type' => 'النوع',
            'price' => 'السعر',
            'status' => 'الحاله',
            'service' => 'الخدمه',
            'details' => 'التفاصيل'
        ]
    ],
    'visits' => [
        'create' => 'انشاء زياره',
        'update' => 'تعديل زياره',
        'details' => 'التفاصيل',
        'fields' => [
            'order_number' => 'رقم الطلب',
            'image' => 'الصوره',
            'details' => 'التفاصيل',
            'visit_date' => 'تاريخ الزياره',
            'visit_time' => 'وقت الزياره',
            'owner_name' => 'اسم المالك',
            'owner_mobile' => 'موبايل المالك',
            'car_image' => 'صوره السياره',
            'qr_image' => 'صوره الرمز او الشفره',
            'visitor_name' => 'اسم الزائر',
            'status' => 'الحاله',
        ]
    ],
    'static' => [
        'create' => 'انشاء صفحه ثابته',
        'update' => 'تعديل الصفحه',
        'fields' => [
            'url' => 'الرابط',
            'content' => 'المحتوي',
        ]
    ],
    'settings' => [
        'update' => 'تعديل الاعدادات',
        'show' => 'كل الاعدادات ',
        'fields' => [
            'site_logo' => 'صوره الموقع',
            'company_name' => 'اسم الشركه',
            'company_url' => 'موقع الشركه',
            'contact_wsp' => 'الواتس اب',
            'contact_fb' => 'الفيسبوك',
            'contact_twitter' => 'تويتر',
            'about_mob' => 'الموبايل',
            'about_email' => 'البريد الالكتروني',
            'about_address' => 'العنوان',
            'about_lat' => 'About Lat',
            'about_long' => 'About Long',
            'terms_conditions' => 'الشروط والاحكام',
            'site_details' => 'تفاصيل الموقع',
            'site_name' => 'اسم الموقع'
        ]
    ],
    'contact' => [
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'message' => 'الرساله',
        ]
    ],
    'places' => [
        'create' => 'انشاء مكان',
        'update' => 'تعديل مكان',
        'fields' => [
            'categories' => 'الاقسام',
            'category' => 'القسم',
            'start_time' => 'وقت البدايه',
            'end_time' => 'وقت النهايه',
            'open' => 'مفتوح',
            'close' => 'مغلق',
            'menu_images' => 'صور قائمه الطعام',
            'place_lat' => 'خطوط الطول',
            'place_long' => 'خطوط العرض',
            'place_details' => 'تفاصيل المكان'

        ]
    ],
    'categories' => [
        'create' => 'انشاء قسم',
        'update' => 'تعديل قسم',
        'fields' => [
            'name' => 'الاسم',
            'image' => 'الصوره',
            'details' => 'التفاصيل'
        ]
    ],
    'order_places' => [
        'create' => 'انشاء طلب',
        'update' => 'تعديل طلب',
        'details' => 'التفاصيل',
        'fields' => [
            'order_number' => 'رقم الطلب',
            'order_date' => 'تاربخ الطلب',
            'order_time' => 'وقت الطلب',
            'order_status' => 'حاله الطلب',
            'owner_id' => 'رقم المالك',
            'owner_name' => 'اسم المالك',
            'owner_mobile' => 'موبايل المالك',
            'place' => 'المكان',
            'place_id' => 'رقم المكان',
            'place_action' => 'حاله المكان',
            'place_action_date' => 'تاريخ تغير حاله المكان',
            'place_action_time' => 'توقيت تغير حاله المكان',
            'worker' => ' اسم العامل',
            'worker_id' => 'رقم العامل',
            'worker_type' => 'نوع العامل',
            'worker_mobile' => 'موبايل العامل',
            'worker_start_date' => 'تاريخ بدايه العامل',
            'worker_start_time' => 'وقت بدايه العامل',
            'worker_delivered_date' => 'تاريخ وصول العامل',
            'worker_delivered_time' => 'وقت وصول العامل',
            'worker_complete_date' => 'تاريخ انتهاء العامل',
            'worker_complete_time' => 'وقت انتهاء العامل',
            'evaluation_degree' => 'درجه التقييم',
            'evaluation_details' => 'تفاصيل التقييم',
            'evaluation_date' => 'تاريخ التقييم',
            'evaluation_time' => 'وقت التقييم',
            'order_long' => 'خطوط العرض',
            'order_lat' => 'خطوط الطول',
            'promo_code_id' => 'رقم العرض',
            'promo_code_percent' => 'نسبه التخفيض',
        ]
    ],
    'products' => [
        'create' => 'انشاء منتج',
        'update' => 'تعديل منتج',
        'fields' => [
            'name' => 'الاسم',
            'product_image' => 'صوره المنتج',
            'place' => 'المكان',
            'type' => 'النوع',
            'status' => 'الحاله',
            'price' => 'السعر',
            'offer' => 'العرض',
            'details' => 'التفاصيل'
        ]
    ],
    'product_types' => [
        'create' => 'انشاء نوع منتج',
        'update' => 'تعديل نوع منتج',
        'fields' => [
            'name' => 'الاسم',
            'status' => 'الحاله',

        ]
    ],
    'custom_order' => [
        'create' => 'انشاء طلب خاص',
        'update' => 'تعديل طلب خاص',
        'fields' => [
            'order_image' => 'صوره الطلب',
            'order_lat' =>     'خطوط العرض',
            'order_long' =>      'خطوط الطول',
            'order_details' =>     'تفاصيل الطلب',
            'qty' => 'الكميه'
        ]
    ],
    'notifications' => [
        'fields' => [
            'title' => 'العنوان',
            'body' =>     'المحتوي',
            'gender' =>      'النوع',
            'user_name' =>     'اسم المستخدم',
            'status' => 'الحاله',

        ]
    ],
];
