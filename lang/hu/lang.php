<?php

return [
    'plugin' => [
        'name' => 'Location',
        'description' => 'Location based features, such as Country and State.'
    ],
    'location' => [
        'label' => 'Tartózkodási hely',
        'new' => 'Új tartózkodási hely',
        'create_title' => 'Tartózkodási hely létrehozása',
        'update_title' => 'Tartózkodási hely szerkesztése',
        'preview_title' => 'Tartózkodási hely villámnézete'
    ],
    'locations' => [
        'menu_label' => 'Tartózkodási helyek',
        'menu_description' => 'Elérhető felhasználói országok és államok / megyék kezelése.',
        'hide_disabled' => 'Letiltottak elrejtése',
        'enabled_label' => 'Engedélyezve',
        'enabled_help' => 'A letiltott tartózkodási helyek nem láthatók a felhasználói oldalon.',
        'enable_or_disable_title' => 'Tartózkodási helyek engedélyezése vagy letiltása',
        'enable_or_disable' => 'Engedélyezés vagy letiltás',
        'selected_amount' => 'Kiválasztott tartózkodási helyek: :amount',
        'enable_success' => 'A tartózkodási helyek engedélyezése sikerült.',
        'disable_success' => 'A tartózkodási helyek letiltása sikerült.',
        'disable_confirm' => 'Biztos benne?',
        'list_title' => 'Tartózkodási helyek kezelése',
        'delete_confirm' => 'Valóban törölni akarja ezt a tartózkodási helyet?',
        'return_to_list' => 'Vissza a tartózkodási helyek listájához',
        'default_country' => 'Alapértelmezett ország',
        'default_country_comment' => 'Ha egy felhasználó nem adja meg a tartózkodási helyét, akkor válasszon egy országot.',
        'default_state' => 'Alapértelmezett állam / megye',
        'default_state_comment' => 'Ha egy felhasználó nem adja meg a tartózkodási helyét, akkor válasszon egy államot / megyét.',
    ],
    'state' => [
        'label' => 'Állam / megye',
        'name' => 'Név',
        'select' => '-- válasszon államot / megyét --',
        'name_comment' => 'Írja be ennek az államnak / megyének a megjelenítendő nevét.',
        'code' => 'Kód',
        'code_comment' => 'Írja be az ezt az államot / megyét azonosító egyedi kódot.'
    ],
    'country' => [
        'name' => 'Név',
        'select' => '-- válasszon országot --',
        'code' => 'Kód',
        'code_comment' => 'Írja be az ezt az országot azonosító egyedi kódot.',
        'enabled' => 'Engedélyezve'
    ]
];
