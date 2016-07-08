<?php

return [
    'plugin' => [
        'name' => 'موقعیت',
        'description' => 'امکانات بر پایه موقعیت مانند کشور و استان'
    ],
    'permissions' => [
        'settings' => 'Locations management',
    ],
    'location' => [
        'location' => 'موقعیت',
        'new' => 'موقعیت جدید',
        'create_title' => 'افزودن موقعیت',
        'update_title' => 'ویرایش موقعیت',
        'preview_title' => 'پیش نمایش موقعیت',
    ],
    'locations' => [
        'menu_label' => 'موقعیت ها',
        'menu_description' => 'مدیریت کشور ها و استانهای موجود برای کاربران.',
        'disabled_label' => 'Disabled',
        'enabled_label' => "فعال",
        'enabled_help' => "موقعیت های غیر فعال شده در محیط کاربری نماسش داده نمی شوند.",
        'enable_or_disable_title' => "فعال و یا غیر فعال سازی موقعیت ها",
        'enable_or_disable' => 'فعال و یا غیر فعال سازی',
        'selected_amount' => ':amount موقعیت انتخاب شده است',
        'enable_success' => "موقعیت ها با موفقیت فعال شدند.",
        'disable_success' => "موقعیت ها با موفقیت غیر فعال شدن.",
        'disable_confirm' => 'آیا اطمینان دارید؟',
        'list_title' => 'مدیریت موقعیت ها',
        'delete_confirm' => 'آیا از حذف این موقعیت اطمینان دارید؟',
        'return_to_list' => 'بازگشت به لیست موقعیت ها',
        'default_country' => 'کشور پیشفرض',
        'default_country_comment' => 'هنگامی که کاربر موقعیت خود را مشخص نکند کشور پیش فرض ایتفاده خواهد شد.',
        'default_state' => 'استان پیش فرض',
        'default_state_comment' => 'هنگامی که کاربر موقعیت خود را مشخص نکند استان پیشفرض انتخاب خواهد شد.',
    ],
    'state' => [
        'label' => 'استان',
        'name' => 'نام',
        'select' => '-- انتخاب استان --',
        'name_comment' => 'نام استان را جهت نمایش وارد نمایید.',
        'code' => 'کد',
        'code_comment' => 'کد یکتایی جهت دسترسی به این استان وارد نمایید.',
    ],
    'country' => [
        'label' => 'کشور',
        'name' => 'نام',
        'select' => '-- انتخاب کشور --',
        'code' => 'کد',
        'code_comment' => 'کد یکتایی را جهت دسترسی به این کشور را وارد نمایید.',
        'enabled' => 'فعال',
    ]
];
