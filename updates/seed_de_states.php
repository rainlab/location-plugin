<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedDeStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('DE')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'BW', 'name' => 'Baden-Württemberg'],
            ['code' => 'BY', 'name' => 'Bayern'],
            ['code' => 'BE', 'name' => 'Berlin'],
            ['code' => 'BB', 'name' => 'Brandenburg'],
            ['code' => 'HB', 'name' => 'Bremen'],
            ['code' => 'HH', 'name' => 'Hamburg'],
            ['code' => 'HE', 'name' => 'Hessen'],
            ['code' => 'MV', 'name' => 'Mecklenburg-Vorpommern'],
            ['code' => 'NI', 'name' => 'Niedersachsen'],
            ['code' => 'NW', 'name' => 'Nordrhein-Westfalen'],
            ['code' => 'RP', 'name' => 'Rheinland-Pfalz'],
            ['code' => 'SL', 'name' => 'Saarland'],
            ['code' => 'SN', 'name' => 'Sachsen'],
            ['code' => 'ST', 'name' => 'Sachsen-Anhalt'],
            ['code' => 'SH', 'name' => 'Schleswig-Holstein'],
            ['code' => 'TH', 'name' => 'Thüringen']
        ]);
    }
}
