<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedBeStates extends Seeder
{
    public function run()
    {
        $be = Country::whereCode('BE')->first();

        if ($be->states()->count() > 0) {
            return;
        }

        $be->states()->createMany([
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
