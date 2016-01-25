<?php namespace RainLab\Location;

use Backend;
use System\Classes\PluginBase;

/**
 * Location Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
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

    public function boot()
    {
        if (class_exists('RainLab\User\Models\User'))
        {
            // extend RainLab.User model
            \RainLab\User\Models\User::extend(function($model) {
                $model->implement[] = 'RainLab.Location.Behaviors.LocationModel';
            });

            // extend RainLab.Users controller
            \RainLab\User\Controllers\Users::extendFormFields(function($form, $model, $context) {

                if (!$model instanceof \RainLab\User\Models\User)
                    return;

                $form->addTabFields([
                    'country' => [
                        'tab' => 'Location',
                        'label'   => 'Country',
                        'type'    => 'Dropdown',
                        'placeholder' => '-- select --'
                    ],
                    'state' => [
                        'tab' => 'Location',
                        'label'   => 'State',
                        'type'    => 'Dropdown',
                        'placeholder' => '-- select --',
                        'dependsOn' => 'country'
                    ]
                ]);
            });
        }
    }

    public function registerSettings()
    {
        return [
            'location' => [
                'label'       => 'rainlab.location::lang.locations.menu_label',
                'description' => 'rainlab.location::lang.locations.menu_description',
                'category'    => 'Locations',
                'icon'        => 'icon-globe',
                'url'         => Backend::url('rainlab/location/locations'),
                'order'       => 500,
                'permissions' => ['rainlab.locations.*']
            ]
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'form_select_country' => ['RainLab\Location\Models\Country', 'formSelect'],
                'form_select_state'   => ['RainLab\Location\Models\State', 'formSelect']
            ]
        ];
    }

    /**
     * Registers any form widgets implemented in this plugin.
     */
    public function registerFormWidgets()
    {
        return [
            'RainLab\Location\FormWidgets\AddressFinder' => [
                'label' => 'Address Finder',
                'code'  => 'addressfinder'
            ]
        ];
    }
}
