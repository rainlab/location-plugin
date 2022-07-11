<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedDkStates extends Seeder
{
    public function run()
    {
        $dk = Country::whereCode('DK')->first();

        if ($dk->states()->count() > 0) {
            return;
        }

        $dk->states()->createMany([
            ['code' => 'HO', 'name' => 'Hovedstaden Region'],
            ['code' => 'MI', 'name' => 'Midtjylland Region'],
            ['code' => 'NO', 'name' => 'Nordjylland Region'],
            ['code' => 'SA', 'name' => 'Sjælland Region'],
            ['code' => 'SY', 'name' => 'Region Syddanmark']
        ]);
    }
}
