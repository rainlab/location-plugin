<?php namespace RainLab\Location\Controllers;

use Lang;
use Flash;
use Backend;
use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;
use Backend\Classes\SettingsController;
use Exception;

/**
 * Locations Backend Controller
 */
class Locations extends SettingsController
{
    /**
     * @var array implement behaviors
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
    ];

    /**
     * @var array formConfig configuration.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var array listConfig configuration.
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array relationConfig configuration.
     */
    public $relationConfig = 'config_relation.yaml';

    /**
     * @var string settingsItemCode determines the settings code
     */
    public $settingsItemCode = 'location';

    /**
     * @var array requiredPermissions to view this page.
     */
    public $requiredPermissions = ['rainlab.location.access_settings'];

    /**
     * {@inheritDoc}
     */
    public function listInjectRowClass($record, $definition = null)
    {
        if (!$record->is_enabled) {
            return 'safe disabled';
        }
    }

    /**
     * relationExtendViewWidget
     */
    public function relationExtendViewWidget($widget)
    {
        $widget->bindEvent('list.injectRowClass', function ($record) {
            if (!$record->is_enabled) {
                return 'safe disabled';
            }
        });
    }

    /**
     * formExtendFields adds available permission fields to the User form.
     * Mark default groups as checked for new Users.
     */
    public function formExtendFields($form)
    {
        if ($codeField = $form->getField('iso_code')) {
            $codeField->commentAbove(str_replace('%s', '<a href="http://en.wikipedia.org/wiki/ISO_3166-1" target="_blank" rel="nofollow">http://en.wikipedia.org/wiki/ISO_3166-1</a>', $codeField->commentAbove));
        }

        if ($codeField = $form->getField('calling_code')) {
            $codeField->commentAbove(str_replace('%s', '<a href="https://en.wikipedia.org/wiki/List_of_country_calling_codes" target="_blank" rel="nofollow">https://en.wikipedia.org/wiki/List_of_country_calling_codes</a>', $codeField->commentAbove));
        }
    }

    /**
     * onLoadDisableForm
     */
    public function onLoadDisableForm()
    {
        try {
            $this->vars['checked'] = post('checked');
            $this->vars['location_type'] = post('location_type');
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }

        return $this->makePartial('disable_form');
    }

    /**
     * onDisableLocations
     */
    public function onDisableLocations()
    {
        $enable = post('enable', false);

        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $objectId) {
                $object = null;
                switch (post('location_type')) {
                    case 'country':
                        $object = Country::find($objectId);
                        break;
                    case 'state':
                        $object = State::find($objectId);
                        break;
                }

                if (!$object) {
                    continue;
                }

                $object->is_enabled = $enable;
                $object->save();
            }

        }

        if ($enable) {
            Flash::success(__("Successfully enabled those locations."));
        }
        else {
            Flash::success(__("Successfully disabled those locations."));
        }

        return redirect()->refresh();
    }

    /**
     * onLoadUnpinForm
     */
    public function onLoadUnpinForm()
    {
        try {
            $this->vars['checked'] = post('checked');
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }

        return $this->makePartial('unpin_form');
    }

    /**
     * onUnpinLocations
     */
    public function onUnpinLocations()
    {
        $pin = post('pin', false);

        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $objectId) {
                if (!$object = Country::find($objectId)) {
                    continue;
                }

                $object->is_pinned = $pin;
                $object->save();
            }

        }

        if ($pin) {
            Flash::success(__("Successfully pinned selected locations."));
        }
        else {
            Flash::success(__("Successfully unpinned selected locations."));
        }

        return Backend::redirect('rainlab/location/locations');
    }
}
