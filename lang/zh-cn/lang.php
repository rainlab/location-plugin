<?php

return [
    'plugin' => [
        'name' => 'Location',
        'description' => 'Location based features, such as Country and State.'
    ],
    'location' => [
        'label' => '位置信息',
        'new' => '新建位置信息',
        'create_title' => '创建位置信息',
        'update_title' => '修改位置信息',
        'preview_title' => '预览位置信息'
    ],
    'locations' => [
        'menu_label' => '位置信息',
        'menu_description' => '管理国家和地区.',
        'hide_disabled' => '隐藏被禁用项',
        'enabled_label' => '启用',
        'enabled_help' => '被禁用后不会继续在前端显示.',
        'enable_or_disable_title' => "启用 或 禁用",
        'enable_or_disable' => '启用 或 禁用',
        'selected_amount' => '已选项: :amount',
        'enable_success' => '成功启用所选项.',
        'disable_success' => '成功禁用所选项.',
        'disable_confirm' => '确认禁用该项?',
        'list_title' => '管理位置信息',
        'delete_confirm' => '确认删除该记录?',
        'return_to_list' => '返回位置列表',
        'default_country' => '默认国家',
        'default_country_comment' => '用户未设置国家时系统默认国家.',
        'default_state' => '省市/地区',
        'default_state_comment' => '用户未选择地区时默认使用省市/地区.',
    ],
    'state' => [
        'label' => '省市/地区',
        'name' => '名字',
        'select' => '-- 选择省市/地区 --',
        'name_comment' => '输入省市/地区名.',
        'code' => '代码',
        'code_comment' => '输入省市/地区代码.'
    ],
    'country' => [
        'label' => '国家',
        'name' => '名字',
        'select' => '-- 选择国家 --',
        'code' => '代码',
        'code_comment' => '输入国家唯一编码.',
        'enabled' => '启用'
    ]
];
