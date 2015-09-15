<?php namespace RainLab\Location\Behaviors;

use Db;
use RainLab\Location\Models\State;
use RainLab\Location\Models\Country;
use System\Classes\ModelBehavior;
use ApplicationException;
use Exception;

/**
 * Location model extension
 *
 * Adds Country and State relations to a model
 *
 * Usage:
 *
 * In the model class definition:
 *
 *   public $implement = ['RainLab.Location.Behaviors.LocationModel'];
 *
 */
class LocationModel extends ModelBehavior
{
    /**
     * Constructor
     */
    public function __construct($model)
    {
        parent::__construct($model);

        $model->addFillable([
            'country',
            'country_id',
            'country_code',
            'state',
            'state_id',
            'state_code'
        ]);

        $model->belongsTo['country'] = ['RainLab\Location\Models\Country'];
        $model->belongsTo['state']   = ['RainLab\Location\Models\State'];
    }

    public function getCountryOptions()
    {
        return Country::getNameList();
    }

    public function getStateOptions()
    {
        return State::getNameList($this->model->country_id);
    }

    /**
     * Sets the "country" relation with the code specified, model lookup used.
     * @param string $code
     */
    public function setCountryCodeAttribute($code)
    {
        if (!$country = Country::whereCode($code)->first()) {
            return;
        }

        $this->model->country = $country;
    }

    /**
     * Sets the "state" relation with the code specified, model lookup used.
     * @param string $code
     */
    public function setStateCodeAttribute($code)
    {
        if (!$state = State::whereCode($code)->first()) {
            return;
        }

        $this->model->state = $state;
    }

    /**
     * Mutator for "country_code" attribute.
     * @return string
     */
    public function getCountryCodeAttribute()
    {
        return $this->model->country ? $this->model->country->code : null;
    }

    /**
     * Mutator for "state_code" attribute.
     * @return string
     */
    public function getStateCodeAttribute()
    {
        return $this->model->state ? $this->model->state->code : null;
    }

    // Fields
    // country:
    //     label: rainlab.user::lang.user.country
    //     type: dropdown
    //     tab: rainlab.user::lang.user.details
    //     span: left
    //     placeholder: rainlab.user::lang.user.select_country

    // state:
    //     label: rainlab.user::lang.user.state
    //     type: dropdown
    //     tab: rainlab.user::lang.user.details
    //     span: right
    //     dependsOn: country
    //     placeholder: rainlab.user::lang.user.select_state

    // Columns
    // country:
    //     label: rainlab.user::lang.user.country
    //     searchable: true
    //     invisible: true
    //     relation: country
    //     select: name
    //     sortable: false

    // state:
    //     label: rainlab.user::lang.user.state
    //     searchable: true
    //     invisible: true
    //     relation: country
    //     select: name
    //     sortable: false


    // !! Probably not needed, but who knows
    //


    // Default country/state
    // # Default Country
    // default_country:
    //     span: left
    //     label: rainlab.user::lang.settings.default_country
    //     comment: rainlab.user::lang.settings.default_country_comment
    //     type: dropdown
    //     tab: rainlab.user::lang.settings.location_tab

    // # Default State
    // default_state:
    //     span: right
    //     label: rainlab.user::lang.settings.default_state
    //     comment: rainlab.user::lang.settings.default_state_comment
    //     type: dropdown
    //     tab: rainlab.user::lang.settings.location_tab
    //     dependsOn: default_country


    // public function getDefaultCountryOptions()
    // {
    //     return Country::getNameList();
    // }

    // public function getDefaultStateOptions()
    // {
    //     return State::getNameList($this->default_country);
    // }
}
