<?php return [
  'plugin' => [
    'name' => '地區',
    'description' => '提供基本地區功能，如國家、州',
  ],
  'permissions' => [
    'settings' => '地區位置',
  ],
  'location' => [
    'label' => '地區',
    'new' => '新地區',
    'create_title' => '建立新地區',
    'update_title' => '編輯地區',
    'preview_title' => '預覽地區',
  ],
  'locations' => [
    'menu_label' => '國家及州',
    'menu_description' => '管理會員可選的國家及州別。',
    'disabled_label' => '已停用',
    'enabled_label' => '啟用',
    'enabled_help' => '停用的位置不會在前台顯示。',
    'enable_or_disable_title' => '啟用或停用位置',
    'enable_or_disable' => '啟用或停用',
    'selected_amount' => '已選取位置數： :amount',
    'enable_success' => '已啟用選取的位置。',
    'disable_success' => '已停用選取的位置。',
    'disable_confirm' => '是否確認？',
    'unpin_label' => '取消釘選',
    'pinned_label' => '已釘選',
    'pinned_help' => '釘選的位置將出現在列表頂部。',
    'pin_or_unpin_title' => '釘選或取消釘選位置',
    'pin_or_unpin' => '釘選或取消釘選',
    'pin_success' => '已釘選所選的位置。',
    'unpin_success' => '已取消釘選所選的位置。',
    'unpin_confirm' => '是否確認？',
    'list_title' => '管理位置',
    'delete_confirm' => '是否刪除這個位置？',
    'return_to_list' => '返回位置列表',
    'default_country' => '預設國別',
    'default_country_comment' => '若會員未選取國家，將直接套用預設的值。',
    'default_state' => '預設州別',
    'default_state_comment' => '若會員未選取州別，將直接套用預設的值。',
  ],
  'settings' => [
    'menu_label' => '位置設定',
    'menu_description' => '管理基本位置設定。',
    'google_maps_key_comment' => '若欲使用 Google Maps 的服務，請在此輸入 API key。',
    'credentials_tab' => '金鑰',
  ],
  'state' => [
    'name' => '名稱',
    'name_comment' => '輸入顯示名稱',
    'code' => '代碼',
    'code_comment' => '輸入用於識別此州的唯一代碼。',
  ],
  'country' => [
    'name' => '名稱',
    'code' => '代碼',
    'code_comment' => '輸入用於識別此國家的唯一代碼。',
    'enabled' => '已啟用',
    'pinned' => '已釘選',
  ],
];
