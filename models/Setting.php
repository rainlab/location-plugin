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
    }
}
