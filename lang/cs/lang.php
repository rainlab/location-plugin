<?php

return [
    'plugin' => [
        'name' => 'Lokace',
        'description' => 'Funkce pro upřesnění lokace, jako třeba Země, nebo Stát.',
    ],
    'permissions' => [
        'settings' => 'Správa lokací',
    ],
    'location' => [
        'label' => 'Lokality',
        'new' => 'Nová lokalita',
        'create_title' => 'Vytvoření lokality',
        'update_title' => 'Úprava lokality',
        'preview_title' => 'Náhled lokality'
    ],
    'locations' => [
        'menu_label' => 'Lokality',
        'menu_description' => 'Správa dostupných zemí a států.',
        'disabled_label' => 'Skrýt neaktivní země',
        'enabled_label' => 'Aktivní',
        'enabled_help' => 'Neaktivní lokality nejsou viditelné na front-endu.',
        'enable_or_disable_title' => 'Aktivace nebo zákaz lokality',
        'enable_or_disable' => 'Aktivovat nebo zakázat',
        'selected_amount' => 'Počet vybraných lokalit: :amount',
        'enable_success' => 'Vybrané lokality byly úspěšně aktivovány.',
        'disable_success' => 'Vybrané lokality byly úspěšně zakázány.',
        'disable_confirm' => 'Jste si jistí?',
        'list_title' => 'Správa lokalit',
        'delete_confirm' => 'Opravdu chcete smazat tuto lokalitu?',
        'return_to_list' => 'Zpět na seznam lokalit',
        'default_country' => 'Výchozí země',
        'default_country_comment' => 'Použije se pokud si uživatel nevybere zemi při registraci.',
        'default_state' => 'Výchozí stát',
        'default_state_comment' => 'Použije se pokud si uživatel nevybere stát při registraci.',
    ],
    'settings' => [
        'menu_label' => 'Nastavení lokalit',
        'menu_description' => 'Nastavení geolokace.',
        'google_maps_key' => 'Google Maps API klíč',
        'google_maps_key_comment' => 'Pokud chcete používat Google Mapy, zadejte zde váš API klíč.',
        'credentials_tab' => 'Údaje',
    ],
    'state' => [
        'label' => 'Stát',
        'name' => 'Jméno',
        'select' => '-- zvolte stát --',
        'name_comment' => 'Zadejte jméno státu.',
        'code' => 'Kód',
        'code_comment' => 'Zadejte unikátní kód státu, např. CZ'
    ],
    'country' => [
        'label' => 'Země',
        'name' => 'Jméno',
        'select' => '-- zvolte zemi --',
        'code' => 'Kód',
        'code_comment' => 'Zadejte unikátní kód země.',
        'enabled' => 'Aktivní',
        'pinned' => 'Preferovat',
    ],
];
