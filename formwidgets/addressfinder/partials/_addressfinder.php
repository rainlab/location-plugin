<?php if ($this->previewMode): ?>
    <div class="form-control"><?= e($value) ?></div>
<?php else: ?>
    <div
        id="<?= $this->getId() ?>"
        class="field-google-place">
        <input
            name="<?= $name ?>"
            id="<?= $this->getId('textarea') ?>"
            value="<?= e($value) ?>"
            class="form-control"
            data-control="location-autocomplete"
            <?= $field->getAttributes() ?>
            data-country-restriction="<?= $this->getCountryRestriction() ?>"
            data-reverse-street-number="<?= $this->getReverseStreetNumber() ?>"
            <?= $this->getFieldMapAttributes() ?>
            />
    </div>
<?php endif ?>
