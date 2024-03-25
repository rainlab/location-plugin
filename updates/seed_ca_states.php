<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedCaStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('CA')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AB', 'name' => 'Alberta'],
            ['code' => 'BC', 'name' => 'British Columbia'],
            ['code' => 'MB', 'name' => 'Manitoba'],
            ['code' => 'NB', 'name' => 'New Brunswick'],
            ['code' => 'NL', 'name' => 'Newfoundland and Labrador'],
            ['code' => 'NT', 'name' => 'Northwest Territories'],
            ['code' => 'NS', 'name' => 'Nova Scotia'],
            ['code' => 'NU', 'name' => 'Nunavut'],
            ['code' => 'ON', 'name' => 'Ontario'],
            ['code' => 'PE', 'name' => 'Prince Edward Island'],
            ['code' => 'QC', 'name' => 'Quebec'],
            ['code' => 'SK', 'name' => 'Saskatchewan'],
            ['code' => 'YT', 'name' => 'Yukon']
        ]);
    }
}
