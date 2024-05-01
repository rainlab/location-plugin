<div data-control="toolbar">
    <?= Ui::button("New Country", 'rainlab/location/locations/create')
        ->icon('icon-plus')
        ->primary() ?>

    <?= Ui::popupButton(__("Enable or Disable"), 'onLoadDisableForm')
        ->ajaxData(['location_type' => 'country'])
        ->listCheckedTrigger()
        ->listCheckedRequest()
        ->icon('icon-magic')
        ->secondary() ?>

    <?= Ui::popupButton(__("Pin or Unpin"), 'onLoadUnpinForm')
        ->listCheckedTrigger()
        ->listCheckedRequest()
        ->icon('icon-map-pin')
        ->secondary() ?>
</div>
