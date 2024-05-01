<div data-control="toolbar">
    <?= Ui::popupButton("New Country", 'onRelationButtonCreate')
        ->icon('icon-file')
        ->secondary() ?>

    <?= Ui::popupButton(__("Enable or Disable"), 'onLoadDisableForm')
        ->ajaxData(['location_type' => 'country'])
        ->listCheckedTrigger()
        ->listCheckedRequest()
        ->icon('icon-magic')
        ->secondary() ?>

    <?= Ui::ajaxButton(__("Delete"), 'onRelationButtonDelete')
        ->listCheckedTrigger()
        ->listCheckedRequest()
        ->confirmMessage(__("Do you really want to delete this location?"))
        ->icon('icon-map-pin')
        ->secondary() ?>
</div>
