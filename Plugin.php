<?php namespace RainLab\Location;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails returns information about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => "Location",
            'description' => "Location based features, such as Country and State.",
            'author' => 'Alexey Bobkov, Samuel Georges',
            'icon' => 'icon-globe',
            'homepage' => 'https://github.com/rainlab/location-plugin'
        ];
    }

    /**
     * registerSettings
     */
    public function registerSettings()
    {
        return [
            'location' => [
                'label' => "Countries & States",
                'description' => "Manage available user countries and states.",
                'category' => "Location",
                'icon' => 'icon-globe',
                'url' => Backend::url('rainlab/location/locations'),
                'order' => 500,
                'permissions' => ['rainlab.location.access_settings'],
                'keywords' => 'country, countries, state',
            ],
            'settings' => [
                'label' => "Location Settings",
                'description' => "Manage location based settings.",
                'category' => "Location",
                'icon' => 'icon-map-signs',
                'class' => \RainLab\Location\Models\Setting::class,
                'order' => 600,
                'permissions' => ['rainlab.location.access_settings'],
            ]
        ];
    }

    /**
     * registerPermissions
     */
    public function registerPermissions()
    {
        return [
            'rainlab.location.access_settings' => [
                'tab' => "Location",
                'label' => "Locations management"
            ],
        ];
    }

    /**
     * registerMarkupTags registers new Twig variables
     */
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'form_select_country' => [\RainLab\Location\Models\Country::class, 'formSelect'],
                'form_select_state' => [\RainLab\Location\Models\State::class, 'formSelect']
            ]
        ];
    }

    /**
     * registerFormWidgets registers any form widgets implemented in this plugin.
     */
    public function registerFormWidgets()
    {
        return [
            \RainLab\Location\FormWidgets\AddressFinder::class => 'addressfinder'
        ];
    }
}
