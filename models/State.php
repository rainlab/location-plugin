<?php namespace RainLab\Location\Models;

use Form;
use Model;

/**
 * State Model
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $country_id
 * @property bool $is_enabled
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
class State extends Model
{
    use \System\Traits\KeyCodeModel;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'rainlab_location_states';

    /**
     * @var bool timestamps enabled
     */
    public $timestamps = false;

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
     * @var array belongsTo
     */
    public $belongsTo = [
        'country' => Country::class
    ];

    /**
     * @var array objectList cache for objectList() method
     */
    protected static $objectList = [];

    /**
     * @var array nameList cache for nameList() method
     */
    protected static $nameList = [];

    /**
     * getNameList returns a list of country names
     */
    public static function getObjectList($countryId)
    {
        if (self::$objectList) {
            return self::$objectList;
        }

        return self::$objectList[$countryId] = self::whereCountryId($countryId)->orderBy('name', 'asc')->get();
    }

    /**
     * getNameList returns a list of state names
     */
    public static function getNameList($countryId)
    {
        if (isset(self::$nameList[$countryId])) {
            return self::$nameList[$countryId];
        }

        return self::$nameList[$countryId] = self::whereCountryId($countryId)->orderBy('name', 'asc')->lists('name', 'id');
    }

    /**
     * scopeApplyEnabled
     */
    public function scopeApplyEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    /**
     * formSelect
     */
    public static function formSelect($name, $countryId = null, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList($countryId), $selectedValue, $options);
    }

    /**
     * getDefault
     */
    public static function getDefault()
    {
        return ($defaultId = Setting::get('default_state'))
            ? static::find($defaultId)
            : null;
    }

    /**
     * @deprecated
     */
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    /**
     * getStateOptionsForFilter
     */
    public function getStateOptionsForFilter($scopes = null)
    {
        if ($scopes->country && ($countryIds = $scopes->country->value)) {
            return self::whereIn('country_id', $countryIds)->orderBy('name', 'asc')->lists('name', 'id');
        }

        return self::lists('name', 'id');
    }
}
