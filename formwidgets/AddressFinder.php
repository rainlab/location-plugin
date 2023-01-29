<?php namespace RainLab\Location\FormWidgets;

use Html;
use Backend\Classes\FormWidgetBase;
use RainLab\Location\Models\Setting;

/**
 * Address finder
 * Renders a Google Place address field.
 *
 * Usage:
 *
 *   address:
 *       label: Address
 *       type: addressfinder
 *       countryRestriction: 'us,ch'
 *       fieldMap:
 *           latitude: latitude
 *           longitude: longitude
 *           city: city
 *           zip: zip
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
class AddressFinder extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'addressfinder';

    /**
     * @var array fieldMap
     */
    protected $fieldMap;

    /**
     * @var string countryRestriction
     */
    protected $countryRestriction;

    /**
     * @var string reverseStreetNumber
     */
    protected $reverseStreetNumber;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->fieldMap = $this->getConfig('fieldMap', []);
        $this->countryRestriction = $this->getConfig('countryRestriction', '');
        $this->reverseStreetNumber = $this->getConfig('reverseStreetNumber', false);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();

        return $this->makePartial('addressfinder');
    }

    /**
     * prepareVars for the list data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['field'] = $this->formField;
    }

    /**
     * getFieldMapAttributes
     */
    public function getFieldMapAttributes()
    {
        $fields = $this->getParentForm()->getFields();
        $result = [];

        foreach ($this->fieldMap as $map => $fieldName) {
            if (!$field = array_get($fields, $fieldName)) {
                continue;
            }

            $result['data-input-'.$map] = '#'.$field->getId();
        }

        return Html::attributes($result);
    }

    /**
     * getCountryRestriction
     */
    public function getCountryRestriction()
    {
        return $this->countryRestriction;
    }

    /**
     * getStreetReverseValue
     */
    public function getReverseStreetNumber()
    {
        return $this->reverseStreetNumber ? 1 : 0;
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $apiKey = Setting::get('google_maps_key');
        $this->addJs('//maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key='.$apiKey);
        $this->addJs('js/location-autocomplete.js', 'core');
    }
}
