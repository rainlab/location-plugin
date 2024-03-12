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
            'name'        => 'rainlab.location::lang.plugin.name',
            'description' => 'rainlab.location::lang.plugin.description',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-globe',
            'homepage'    => 'https://github.com/rainlab/location-plugin'
        ];
    }

    /**
     * registerSettings
     */
    public function registerSettings()
    {
        return [
            'location' => [
                'label' => 'rainlab.location::lang.locations.menu_label',
                'description' => 'rainlab.location::lang.locations.menu_description',
                'category' => 'rainlab.location::lang.plugin.name',
                'icon' => 'icon-globe',
                'url' => Backend::url('rainlab/location/locations'),
                'order' => 500,
                'permissions' => ['rainlab.location.access_settings'],
                'keywords' => 'country, countries, state',
            ],
            'settings' => [
                'label' => 'rainlab.location::lang.settings.menu_label',
                'description' => 'rainlab.location::lang.settings.menu_description',
                'category' => 'rainlab.location::lang.plugin.name',
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
            'rainlab.location.access_settings' => ['tab' => 'rainlab.location::lang.plugin.name', 'label' => 'rainlab.location::lang.permissions.settings'],
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
