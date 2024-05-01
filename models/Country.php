<?php namespace RainLab\Location\Models;

use Http;
use Form;
use Model;
use Exception;

/**
 * Country Model
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $iso_code
 * @property string $numeric_code
 * @property string $calling_code
 * @property bool $is_enabled
 * @property bool $is_enabled_edit
 * @property bool $is_pinned
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
class Country extends Model
{
    use \System\Traits\KeyCodeModel;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'rainlab_location_countries';

    /**
     * @var bool timestamps enabled
     */
    public $timestamps = false;

    /**
     * @var array fillable fields
     */
    protected $fillable = [
        'name',
        'code',
        'calling_code'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'code' => 'unique:rainlab_location_countries',
    ];

    /**
     * @var array hasMany
     */
    public $hasMany = [
        'states' => State::class
    ];

    /**
     * @var array objectList cache for objectList() method
     */
    protected static $objectList = null;

    /**
     * @var array nameList cache for nameList() method
     */
    protected static $nameList = null;

    /**
     * getNameList returns a list of country names
     */
    public static function getObjectList()
    {
        if (self::$objectList) {
            return self::$objectList;
        }

        return self::$objectList = self::applyEnabled()->orderBy('is_pinned', 'desc')->orderBy('name', 'asc')->get();
    }

    /**
     * getNameList
     */
    public static function getNameList()
    {
        if (self::$nameList) {
            return self::$nameList;
        }

        return self::$nameList = self::isEnabled()->orderBy('is_pinned', 'desc')->orderBy('name', 'asc')->lists('name', 'id');
    }

    /**
     * fetchStates
     */
    public function fetchStates()
    {
        return State::getObjectList($this->getKey());
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
    public static function formSelect($name, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList(), $selectedValue, $options);
    }

    /**
     * getDefault
     */
    public static function getDefault()
    {
        return ($defaultId = Setting::get('default_country'))
            ? static::find($defaultId)
            : null;
    }

    /**
     * getFromIp attempts to find a country from the IP address.
     */
    public static function getFromIp($ipAddress): ?static
    {
        try {
            $response = Http::get('https://api.country.is/'.$ipAddress);

            if ($response->status() === 200) {
                $json = json_decode($response->body());
                return static::where('code', strtolower($json->country))->first();
            }
        }
        catch (Exception $ex) {}

        return null;
    }

    /**
     * @deprecated
     */
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }
}
