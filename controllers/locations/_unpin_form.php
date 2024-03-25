<?= Form::open(['id' => 'unpinForm']) ?>
    <div class="modal-header">
        <h4 class="modal-title"><?= __("Pin or Unpin Locations") ?></h4>
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
                        name="pin"
                        value="1"
                        id="locationUnpin">
                    <label for="locationUnpin" class="storm-icon-pseudo">
                        <?= __("Pinned") ?>
                    </label>
                    <p class="help-block form-text"><?= __("Pinned locations are sorted first in the list.") ?></p>
                </div>

            </div>
        </div>

        <?php foreach ($checked as $id): ?>
            <input type="hidden" name="checked[]" value="<?= $id ?>" />
        <?php endforeach ?>
    </div>
    <div class="modal-footer">
        <button
            type="submit"
            class="btn btn-primary"
            data-request="onUnpinLocations"
            data-request-confirm="<?= __("Are you sure?") ?>"
            data-stripe-load-indicator>
            <?= __("Apply") ?>
        </button>
        <button
            type="button"
            class="btn btn-default"
            data-dismiss="popup">
            <?= __("Cancel") ?>
        </button>
    </div>
<?= Form::close() ?>
