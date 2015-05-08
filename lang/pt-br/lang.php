<?php

return [
    'plugin' => [
        'name' => 'Location',
        'description' => 'Location based features, such as Country and State.'
    ],
    'location' => [
        'label' => 'Local',
        'new' => 'Novo Local',
        'create_title' => 'Criar Local',
        'update_title' => 'Editar Local',
        'preview_title' => 'Pré-visualizar Local'
    ],
    'locations' => [
        'menu_label' => 'Locais',
        'menu_description' => 'Gerenciar países e estados disponíveis.',
        'hide_disabled' => 'Ocultar desabilitados',
        'enabled_label' => 'Habilitado',
        'enabled_help' => 'Locais desabilitados não são visíveis no front-end.',
        'enable_or_disable_title' => "Habilitar ou Desabilitar Locais",
        'enable_or_disable' => 'Habilitar ou Desabilitar',
        'selected_amount' => 'Locais selecionados :amount',
        'enable_success' => 'Locais habilitados com sucesso.',
        'disable_success' => 'Locais desabilitados com sucesso.',
        'disable_confirm' => 'Você tem certeza?',
        'list_title' => 'Gerenciar Locais',
        'delete_confirm' => 'Você realmente deseja deletar este local?',
        'return_to_list' => 'Retornar à lista de locais',
        'default_country' => 'País padrão',
        'default_country_comment' => 'Quando um usuário não especifica seu local, selecione um país padrão para usar.',
        'default_state' => 'Estado padrão',
        'default_state_comment' => 'Quando um usuário não especifica seu local, selecione um estado padrão para usar.',
    ],
    'state' => [
        'label' => 'Estado',
        'name' => 'Nome',
        'select' => '-- selecione um estado --',
        'name_comment' => 'Informe do nome de exibição para este estado.',
        'code' => 'Código',
        'code_comment' => 'Informe o código único pra este estado.'
    ],
    'country' => [
        'label' => 'País',
        'name' => 'Nome',
        'select' => '-- selecione um país --',
        'code' => 'Código',
        'code_comment' => 'Informe um código único para este país.',
        'enabled' => 'Habilitado'
    ]
];
