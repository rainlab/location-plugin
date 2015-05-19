<?php namespace RainLab\Location\Models;

use Form;
use Model;

/**
 * State Model
 */
class State extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_location_states';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name', 'code'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'code' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'country' => ['RainLab\Location\Models\Country']
    ];

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Cache for nameList() method
     */
    protected static $nameList = [];

    /**
     * Get list of State names for dropdowns
     * @param  Country|int  $country    Country model or ID to list the States from
     * @return array
     */
    public static function getNameList($country)
    {
        $country instanceof Country
        ? self::setNameList($countryId = $country->id, $country->states())
        : self::setNameList($countryId = $country, self::whereCountryId($country));

        return self::$nameList[$countryId];
    }

    /**
     * Add the State list to cache for a given Country
     * @param int             $countryId
     * @param Builder|HasMany $stateModel
     */
    protected static function setNameList($countryId, $stateModel)
    {
        if (!isset(self::$nameList[$countryId])) {
            self::$nameList[$countryId] = $stateModel->lists('name', 'id');
        }
    }

    public static function formSelect($name, $countryId = null, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList($countryId), $selectedValue, $options);
    }

    public static function getDefault()
    {
        return static::find(Settings::get('default_state', 1));
    }
}
