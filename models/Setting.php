<?php namespace RainLab\Location\Models;

use System\Models\SettingModel;

/**
 * Setting model for locations
 */
class Setting extends SettingModel
{
    /**
     * @var string settingsCode
     */
    public $settingsCode = 'location_settings';

    /**
     * @var string settingsFields
     */
    public $settingsFields = 'fields.yaml';

    /**
     * initSettingsData
     */
    public function initSettingsData()
    {
        $this->google_maps_key = '';
        $this->default_country = 1;
        $this->default_state = 1;
    }

    /**
     * getDefaultCountryOptions
     */
    public function getDefaultCountryOptions()
    {
        return Country::getNameList();
    }

    /**
     * getDefaultStateOptions
     */
    public function getDefaultStateOptions()
    {
        return State::getNameList($this->default_country);
    }
}
