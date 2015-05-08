<?php

return [
    'plugin' => [
        'name' => 'Location',
        'description' => 'Location based features, such as Country and State.'
    ],
    'location' => [
        'label' => 'Lieu',
        'new' => 'Nouveau Lieu',
        'create_title' => 'Créer un Lieu',
        'update_title' => 'Editer un Lieu',
        'preview_title' => 'Prévisualiser un Lieu'
    ],
    'locations' => [
        'menu_label' => 'Lieux',
        'menu_description' => 'Gestion des Pays et Etats disponibles pour les utilisateurs.',
        'hide_disabled' => 'Cacher les items désactivés',
        'enabled_label' => 'Autorisé',
        'enabled_help' => 'Désactiver les lieux pour les rendre invisibles sur le Front-end.',
        'enable_or_disable_title' => "Activer ou Désactiver Lieux",
        'enable_or_disable' => 'Activer ou Désactiver',
        'selected_amount' => 'Lieu sélectionné: :amount',
        'enable_success' => 'Ces lieux ont été activés.',
        'disable_success' => 'Ces lieux ont été désactivés.',
        'disable_confirm' => 'Êtes-vous sûr que vous voulez faire cette opération ?',
        'list_title' => 'Gérer les Lieux',
        'delete_confirm' => 'Souhaitez-vous vraiment effacer ce lieu ?',
        'return_to_list' => 'Retour à la liste des Lieux',
        'default_country' => 'Pays par défaut',
        'default_country_comment' => 'Si un utilisateur n\'indique pas son pays, ce pays sera choisi par défaut.',
        'default_state' => 'Etat par défaut',
        'default_state_comment' => 'Si un utilisateur n\'indique pas son état, cet état sera choisi par défaut.',
    ],
    'state' => [
        'label' => 'Etat',
        'name' => 'Nom',
        'select' => '-- Choisissez un état (Etats-Unis) --',
        'name_comment' => 'Entrez le nom/libellé de cet état.',
        'code' => 'Code',
        'code_comment' => 'Entrez un code unique pour identifier cet état.'
    ],
    'country' => [
        'label' => 'Pays',
        'name' => 'Nom',
        'select' => '-- Choisissez le pays --',
        'code' => 'Code',
        'code_comment' => 'Entrez un code unique pour identifier ce pays.',
        'enabled' => 'Enabled'
    ]
];
