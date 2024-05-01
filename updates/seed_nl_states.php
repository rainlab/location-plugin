<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedNlStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('NL')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'DR', 'name' => 'Drenthe'],
            ['code' => 'FL', 'name' => 'Flevoland'],
            ['code' => 'FR', 'name' => 'Friesland'],
            ['code' => 'GE', 'name' => 'Gelderland'],
            ['code' => 'GR', 'name' => 'Groningen'],
            ['code' => 'LI', 'name' => 'Limburg'],
            ['code' => 'NB', 'name' => 'Noord-Brabant'],
            ['code' => 'NH', 'name' => 'Noord-Holland'],
            ['code' => 'OV', 'name' => 'Overijssel'],
            ['code' => 'UT', 'name' => 'Utrecht'],
            ['code' => 'ZE', 'name' => 'Zeeland'],
            ['code' => 'ZH', 'name' => 'Zuid-Holland']
        ]);
    }
}
