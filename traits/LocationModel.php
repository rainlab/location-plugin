<?php namespace RainLab\Location\Traits;

use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;

/**
 * LocationModel adds country and state features to a model
 *
 * @property int $country_id
 * @property int $state_id
 * @property string $country_code
 * @property string $state_code
 * @property \RainLab\Location\Models\Country|null $country
 * @property \RainLab\Location\Models\State|null $state
 * @method \October\Rain\Database\Relations\BelongsTo country()
 * @method \October\Rain\Database\Relations\BelongsTo state()
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
trait LocationModel
{
    /**
     * initializeLocationModel
     */
    public function initializeLocationModel()
    {
        $this->addFillable([
            'country',
            'country_id',
            'country_code',
            'state',
            'state_id',
            'state_code'
        ]);

        $this->belongsTo['country'] = [
            Country::class,
            'replicate' => false
        ];

        $this->belongsTo['state'] = [
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
        return State::getNameList($this->country_id);
    }

    /**
     * setCountryCodeAttribute as the "country" relation with the code specified, model lookup used.
     */
    public function setCountryCodeAttribute(string $code)
    {
        if (!$country = Country::whereCode($code)->first()) {
            return;
        }

        $this->country = $country;
    }

    /**
     * setStateCodeAttribute as the "state" relation with the code specified, model lookup used.
     */
    public function setStateCodeAttribute(string $code)
    {
        if (!$state = State::whereCode($code)->first()) {
            return;
        }

        $this->state = $state;
    }

    /**
     * getCountryCodeAttribute mutator for "country_code" attribute.
     */
    public function getCountryCodeAttribute(): ?string
    {
        return $this->country ? $this->country->code : null;
    }

    /**
     * getStateCodeAttribute mutator for "state_code" attribute.
     */
    public function getStateCodeAttribute(): ?string
    {
        return $this->state ? $this->state->code : null;
    }

    /**
     * setCountryIdAttribute ensures an integer value is set, otherwise nullable.
     */
    public function setCountryIdAttribute($value)
    {
        $this->attributes['country_id'] = $value ?: null;
    }

    /**
     * setStateIdAttribute ensures an integer value is set, otherwise nullable.
     */
    public function setStateIdAttribute($value)
    {
        $this->attributes['state_id'] = $value ?: null;
    }
}
