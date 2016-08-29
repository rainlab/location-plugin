<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedPinnedCountries extends Seeder
{
    public function run()
    {
        foreach (['AU', 'CA', 'GB', 'US'] as $countryCode) {
            $country = Country::whereCode($countryCode)->first();
            $country->is_pinned = 1;
            $country->save();
        }
    }
}
