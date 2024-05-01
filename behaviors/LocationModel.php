<?php namespace RainLab\Location\Behaviors;

use RainLab\Location\Models\State;
use RainLab\Location\Models\Country;
use System\Classes\ModelBehavior;

/**
 * LocationModel extension adds Country and State relations to a model
 *
 * Usage in the model class definition:
 *
 *     public $implement = [\RainLab\Location\Behaviors\LocationModel::class];
 *
 */
class LocationModel extends ModelBehavior
{
    /**
     * __construct
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

        $model->belongsTo['country'] = [
            Country::class,
            'replicate' => false
        ];

        $model->belongsTo['state'] = [
            State::class,
            'replicate' => false
        ];
    }

    /**
     * getCountryOptions
     */
    public function getCountryOptions()
    {
        return Country::getNameList();
    }

    /**
     * getStateOptions
     */
    public function getStateOptions()
    {
        return State::getNameList($this->model->country_id);
    }

    /**
     * setCountryCodeAttribute sets the "country" relation with the code specified, model lookup used.
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
     * setStateCodeAttribute sets the "state" relation with the code specified, model lookup used.
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
     * getCountryCodeAttribute mutator for "country_code" attribute.
     * @return string
     */
    public function getCountryCodeAttribute()
    {
        return $this->model->country ? $this->model->country->code : null;
    }

    /**
     * getStateCodeAttribute mutator for "state_code" attribute.
     * @return string
     */
    public function getStateCodeAttribute()
    {
        return $this->model->state ? $this->model->state->code : null;
    }

    /**
     * setCountryIdAttribute ensures an integer value is set, otherwise nullable.
     */
    public function setCountryIdAttribute($value)
    {
        $this->model->attributes['country_id'] = $value ?: null;
    }

    /**
     * setStateIdAttribute ensures an integer value is set, otherwise nullable.
     */
    public function setStateIdAttribute($value)
    {
        $this->model->attributes['state_id'] = $value ?: null;
    }
}
