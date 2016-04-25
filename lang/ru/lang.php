<?php

return [
    'plugin' => [
        'name' => 'Location',
        'description' => 'Location based features, such as Country and State.'
    ],
    'permissions' => [
        'settings' => 'Locations management',
    ],
    'location' => [
        'location' => 'локацию',
        'new' => 'Новая локация',
        'create_title' => 'Создать локацию',
        'update_title' => 'Изменить локацию',
        'preview_title' => 'Просмотр локации',
    ],
    'locations' => [
        'menu_label' => 'Локации',
        'menu_description' => 'Управление доступными локациями (страны, города, штаты).',
        'disabled_label' => 'Скрыть отключенные',
        'enabled_label' => "Разрешить локации для выбора",
        'enabled_help' => "Переключение доступности выбора локаций в настройках пользователя.",
        'enable_or_disable_title' => "Включение и отключение локаций",
        'enable_or_disable' => 'Включить или отключить',
        'selected_amount' => 'Выбрано локаций: :amount',
        'enable_success' => "Выбранные локации теперь доступны для выбора.",
        'disable_success' => "Выбранные локации теперь не доступны для выбора.",
        'disable_confirm' => 'Вы уверены?',
        'list_title' => 'Управление локациями',
        'delete_confirm' => 'Вы действительно хотите удалить эту локацию?',
        'return_to_list' => 'Вернуться к списку локаций',
        'default_country' => 'Страна по умолчанию',
        'default_country_comment' => 'Если пользователь не определяет своё местоположение, будет установлена страна по умолчанию.',
        'default_state' => 'Штат по умолчанию',
        'default_state_comment' => 'Если пользователь не определяет своё местоположение, будет установлен штат по умолчанию.',
    ],
    'state' => [
        'label' => 'Штат',
        'name' => 'Название',
        'select' => '-- select state --',
        'name_comment' => 'Введите отображаемое имя для данного государства.',
        'code' => 'Код',
        'code_comment' => 'Введите уникальный код для идентификации этой страны.',
    ],
    'country' => [
        'label' => 'Country',
        'name' => 'Название',
        'select' => '-- select country --',
        'code' => 'Код',
        'code_comment' => 'Введите уникальный код для идентификации этой страны.',
        'enabled' => 'Доступно для выбора',
    ]
];
