<?php namespace RainLab\Location\Models;

use Model;

class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'location_settings';
    public $settingsFields = 'fields.yaml';

    public function initSettingsData()
    {
        $this->google_maps_key = '';
        $this->default_country = 1;
        $this->default_state = 1;
    }

    public function getDefaultCountryOptions()
    {
        return Country::getNameList();
    }

    public function getDefaultStateOptions()
    {
        return State::getNameList($this->default_country);
    }
}
