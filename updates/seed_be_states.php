<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedBeStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('BE')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AN', 'name' => 'Antwerpen'],
            ['code' => 'OV', 'name' => 'Oost-Vlaanderen'],
            ['code' => 'VB', 'name' => 'Vlaams-Brabant'],
            ['code' => 'WV', 'name' => 'West-Vlaanderen'],
            ['code' => 'HA', 'name' => 'Hainaut'],
            ['code' => 'LU', 'name' => 'Luxembourg'],
            ['code' => 'NA', 'name' => 'Namur'],
            ['code' => 'WA', 'name' => 'Walloon Region'],
            ['code' => 'BR', 'name' => 'Brussels Hoofdstedelijk Gewest']
        ]);
    }
}
