<?= Form::open(['id' => 'disableForm']) ?>
    <input type="hidden" name="location_type" value="<?= $location_type ?>">
    <div class="modal-header">
        <h4 class="modal-title"><?= __("Enable or Disable Locations") ?></h4>
        <button type="button" class="btn-close" data-dismiss="popup"></button>
    </div>
    <div class="modal-body">
        <?php if ($this->fatalError): ?>
            <p class="flash-message static error"><?= $fatalError ?></p>
        <?php endif ?>

        <p><?= __("Locations selected: :amount", ['amount'=>count($checked)]) ?></p>

        <div class="form-preview">
            <div class="form-group">

                <!-- Checkbox -->
                <div class="checkbox custom-checkbox">
                    <input
                        type="checkbox"
                        name="enable"
                        value="1"
                        id="locationDisable">
                    <label for="locationDisable" class="storm-icon-pseudo">
                        <?= __("Enabled") ?>
                    </label>
                    <p class="help-block form-text"><?= __("Disabled locations are not visible on the front-end.") ?></p>
                </div>

            </div>
        </div>

        <?php foreach ($checked as $id): ?>
            <input type="hidden" name="checked[]" value="<?= $id ?>" />
        <?php endforeach ?>
    </div>
    <div class="modal-footer">
        <?= Ui::ajaxButton("Apply", 'onDisableLocations')
            ->confirmMessage("Are you sure?")
            ->primary() ?>

        <?= Ui::button("Cancel")
            ->dismissPopup()
            ->cssClass('ms-auto') ?>
    </div>
<?= Form::close() ?>
