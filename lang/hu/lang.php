<?php

return [
    'plugin' => [
        'name' => 'Helyek',
        'description' => 'Tartózkodási helyek, úgy mint országok és megyék.'
    ],
    'permissions' => [
        'settings' => 'Helyek menedzselése'
    ],
    'location' => [
        'label' => 'Tartózkodási hely',
        'new' => 'Új tartózkodási hely',
        'create_title' => 'Tartózkodási hely létrehozása',
        'update_title' => 'Tartózkodási hely szerkesztése',
        'preview_title' => 'Tartózkodási hely villámnézete'
    ],
    'locations' => [
        'menu_label' => 'Tartózkodások',
        'menu_description' => 'Elérhető országok és megyék kiválasztása.',
        'disabled_label' => 'Letiltottak elrejtése',
        'enabled_label' => 'Engedélyezve',
        'enabled_help' => 'A letiltott tartózkodási helyek nem láthatók a felhasználói oldalon.',
        'enable_or_disable_title' => 'Tartózkodási helyek engedélyezése vagy letiltása',
        'enable_or_disable' => 'Engedélyezés vagy letiltás',
        'selected_amount' => 'Kiválasztott tartózkodási helyek: :amount',
        'enable_success' => 'A tartózkodási helyek engedélyezése sikerült.',
        'disable_success' => 'A tartózkodási helyek letiltása sikerült.',
        'disable_confirm' => 'Biztos benne?',
        'unpin_label' => 'Feloldás',
        'pinned_label' => 'Rögzítve',
        'pinned_help' => 'A rögzített helyek elől fognak szerepelni a listában.',
        'pin_or_unpin_title' => 'Rögzített vagy feloldott helyek',
        'pin_or_unpin' => 'Rögzítés vagy feloldás',
        'pin_success' => 'A helyek sikeresen rögzítve lettek.',
        'unpin_success' => 'A helyek sikeresen fel lettek oldva.',
        'unpin_confirm' => 'Biztos benne?',
        'list_title' => 'Tartózkodási helyek kezelése',
        'delete_confirm' => 'Valóban törölni akarja ezt a tartózkodási helyet?',
        'return_to_list' => 'Vissza a tartózkodási helyekhez',
        'default_country' => 'Alapértelmezett ország',
        'default_country_comment' => 'Ha egy felhasználó nem adja meg a tartózkodási helyét, akkor válasszon egy országot.',
        'default_state' => 'Alapértelmezett állam / megye',
        'default_state_comment' => 'Ha egy felhasználó nem adja meg a tartózkodási helyét, akkor válasszon egy államot / megyét.'
    ],
    'settings' => [
        'menu_label' => 'Beállítások',
        'menu_description' => 'Alapértelmezett lehetőségek és hitelesítés megadása.',
        'google_maps_key' => 'Google Térkép API kulcs',
        'google_maps_key_comment' => 'Ha a Google Térkép szolgáltatásait kívánja használni, írja be ide az API kulcsot.',
        'credentials_tab' => 'Hitelesítés'
    ],
    'state' => [
        'label' => 'Állam / megye',
        'name' => 'Név',
        'select' => '-- válasszon államot / megyét --',
        'name_comment' => 'Írja be az államnak / megyének a megjelenítendő nevét.',
        'code' => 'Kód',
        'code_comment' => 'Írja be az államot / megyét azonosító egyedi kódot.'
    ],
    'country' => [
        'label' => 'Országok',
        'name' => 'Név',
        'select' => '-- válasszon országot --',
        'code' => 'Kód',
        'code_comment' => 'Írja be az országot azonosító egyedi kódot.',
        'enabled' => 'Engedélyezve',
        'pinned' => 'Rögzítve'
    ]
];
