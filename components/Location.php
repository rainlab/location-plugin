<?php namespace Rainlab\Location\Components;

use RainLab\Location\Models\Country;
use Cms\Classes\ComponentBase;

/**
 * Location Component
 */
class Location extends ComponentBase
{
    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'Location Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * availableCountries
     */
    public function availableCountries()
    {
        return Country::getObjectList();
    }
}
