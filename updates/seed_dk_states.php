<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedDkStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('DK')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'HO', 'name' => 'Hovedstaden Region'],
            ['code' => 'MI', 'name' => 'Midtjylland Region'],
            ['code' => 'NO', 'name' => 'Nordjylland Region'],
            ['code' => 'SA', 'name' => 'Sjælland Region'],
            ['code' => 'SY', 'name' => 'Region Syddanmark']
        ]);
    }
}
