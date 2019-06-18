<?php namespace RainLab\Location\Models;

use Http;
use Form;
use Model;
use Exception;

/**
 * Country Model
 */
class Country extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_location_countries';

    /**
     * @var array Behaviours implemented by this model.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array The translatable table fields.
     */
    public $translatable = ['name'];

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
        'code' => 'unique:rainlab_location_countries',
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'states' => ['RainLab\Location\Models\State']
    ];

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Cache for nameList() method
     */
    protected static $nameList = null;

    public static function getNameList()
    {
        if (self::$nameList) {
            return self::$nameList;
        }

        return self::$nameList = self::isEnabled()->orderBy('is_pinned', 'desc')->orderBy('name', 'asc')->lists('name', 'id');
    }

    public static function formSelect($name, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList(), $selectedValue, $options);
    }

    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public static function getDefault()
    {
        return ($defaultId = Setting::get('default_country'))
            ? static::find($defaultId)
            : null;
    }

    /**
     * Attempts to find a country from the IP address.
     * @param string $ipAddress
     * @return self
     */
    public static function getFromIp($ipAddress)
    {
        try {
            $body = (string) Http::get('http://ip2c.org/?ip='.$ipAddress);

            if (substr($body, 0, 1) === '1') {
                $code = explode(';', $body)[1];
                return static::where('code', $code)->first();
            }
        }
        catch (Exception $e) {}
    }
}
