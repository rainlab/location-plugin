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

        $guarded = $model->getGuarded();

        if (count($guarded) === 1 && $guarded[0] === '*') {
            $model->addFillable([
                'country',
                'country_id',
                'country_code',
                'state',
                'state_id',
                'state_code'
            ]);
        }

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

    /**
     * Ensure an integer value is set, otherwise nullable.
     */
    public function setCountryIdAttribute($value)
    {
        $this->model->attributes['country_id'] = $value ?: null;
    }

    /**
     * Ensure an integer value is set, otherwise nullable.
     */
    public function setStateIdAttribute($value)
    {
        $this->model->attributes['state_id'] = $value ?: null;
    }
}
