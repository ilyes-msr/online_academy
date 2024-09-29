<?php

return [

    'accepted'             => 'يجب قبول :attribute.',
    'active_url'          => ':attribute ليس رابطًا صحيحًا.',
    'after'               => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal'      => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date.',
    'alpha'               => 'يمكن أن يحتوي :attribute على حروف فقط.',
    'alpha_dash'          => 'يمكن أن يحتوي :attribute على حروف وأرقام وشرطات فقط.',
    'alpha_num'           => 'يمكن أن يحتوي :attribute على حروف وأرقام فقط.',
    'array'               => 'يجب أن يكون :attribute مصفوفة.',
    'before'              => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal'     => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date.',
    'between'             => [
        'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
        'file'    => 'يجب أن تكون :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :min إلى :max حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على :min إلى :max عناصر.',
    ],
    'boolean'             => 'يجب أن تكون القيمة في :attribute صحيحة أو خاطئة.',
    'confirmed'           => 'تأكيد :attribute غير متطابق.',
    'date'                => ':attribute ليس تاريخًا صحيحًا.',
    'date_format'         => ':attribute لا يتطابق مع التنسيق :format.',
    'different'           => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits'              => 'يجب أن يحتوي :attribute على :digits رقمًا.',
    'digits_between'      => 'يجب أن يحتوي :attribute على :min إلى :max رقمًا.',
    'dimensions'          => 'يجب أن يحتوي :attribute على أبعاد صورة صحيحة.',
    'distinct'            => 'يحتوي :attribute على قيمة مكررة.',
    'email'               => 'يجب أن يكون :attribute بريدًا إلكترونيًا صحيحًا.',
    'exists'              => 'القيمة المختارة في :attribute غير صحيحة.',
    'file'                => 'يجب أن تكون :attribute ملفًا.',
    'filled'              => 'يجب أن تحتوي :attribute على قيمة.',
    'gt'                  => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'file'    => 'يجب أن تكون :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على أكثر من :value حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على أكثر من :value عنصرًا.',
    ],
    'gte'                 => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'file'    => 'يجب أن تكون :attribute أكبر من أو تساوي :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :value حرفًا أو أكثر.',
        'array'   => 'يجب أن تحتوي :attribute على :value عنصرًا أو أكثر.',
    ],
    'image'               => 'يجب أن يكون :attribute صورة.',
    'in'                  => 'القيمة المختارة في :attribute غير صحيحة.',
    'in_array'            => 'لا توجد قيمة في :attribute.',
    'integer'             => 'يجب أن يكون :attribute رقمًا صحيحًا.',
    'ip'                  => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'json'                => 'يجب أن يكون :attribute سلسلة JSON صحيحة.',
    'lt'                  => [
        'numeric' => 'يجب أن يكون :attribute أقل من :value.',
        'file'    => 'يجب أن تكون :attribute أقل من :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على أقل من :value حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على أقل من :value عنصرًا.',
    ],
    'lte'                 => [
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
        'file'    => 'يجب أن تكون :attribute أقل من أو تساوي :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :value حرفًا أو أقل.',
        'array'   => 'يجب أن تحتوي :attribute على :value عنصرًا أو أقل.',
    ],
    'max'                 => [
        'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
        'file'    => 'يجب ألا تكون :attribute أكبر من :max كيلوبايت.',
        'string'  => 'يجب ألا يحتوي :attribute على أكثر من :max حرفًا.',
        'array'   => 'يجب ألا تحتوي :attribute على أكثر من :max عنصرًا.',
    ],
    'mimes'               => 'يجب أن يكون :attribute من النوع: :values.',
    'mimetypes'           => 'يجب أن يكون :attribute من النوع: :values.',
    'min'                 => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file'    => 'يجب أن تكون :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على الأقل :min حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على الأقل :min عنصرًا.',
    ],
    'not_in'              => 'القيمة المختارة في :attribute غير صحيحة.',
    'not_regex'           => 'التنسيق في :attribute غير صحيح.',
    'numeric'             => 'يجب أن يكون :attribute رقمًا.',
    'present'             => 'يجب أن يكون :attribute موجودًا.',
    'regex'               => 'التنسيق في :attribute غير صحيح.',
    'required'            => 'الحقل :attribute مطلوب.',
    'required_if'        => 'الحقل :attribute مطلوب عندما تكون :other هي :value.',
    'required_unless'     => 'الحقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with'       => 'الحقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all'   => 'الحقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without'     => 'الحقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'الحقل :attribute مطلوب عندما لا توجد أي من :values.',
    'same'                => 'يجب أن يتطابق :attribute مع :other.',
    'size'                => [
        'numeric' => 'يجب أن يكون :attribute بحجم :size.',
        'file'    => 'يجب أن تكون :attribute بحجم :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :size حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على :size عنصرًا.',
    ],
    'string'              => 'يجب أن يكون :attribute سلسلة.',
    'timezone'            => 'يجب أن يكون :attribute منطقة صحيحة.',
    'unique'              => 'قيمة :attribute مُستخدمة مسبقًا.',
    'uploaded'            => 'فشل في تحميل :attribute.',
    'url'                 => 'التنسيق في :attribute غير صحيح.',
    'uuid'                => 'يجب أن يكون :attribute UUID صحيحًا.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'age' => 'العمر',
        'gender' => 'الجنس',
        'date_of_birth' => 'تاريخ الميلاد',
        'phone' => 'رقم الهاتف',
        'address' => 'العنوان',
        'city' => 'المدينة',
        'country' => 'البلد',
        'title' => 'العنوان',
        'content' => 'المحتوى',
        'description' => 'الوصف',
        'price' => 'السعر',
        'quantity' => 'الكمية',
        'image' => 'الصورة',
        'category' => 'الفئة',
        'start_date' => 'تاريخ البداية',
        'end_date' => 'تاريخ النهاية',
        'role' => 'الدور',
        'permissions' => 'الأذونات',
        'file' => 'الملف',
        'username' => 'اسم المستخدم',
        'current_password' => 'كلمة المرور الحالية',
        'new_password' => 'كلمة المرور الجديدة',
        'category_id' => 'الصنف',
        'image_path' => 'الصورة',
        'video_path' => 'رابط الفيديو',
        'body' => 'المقال',
    ],

];
