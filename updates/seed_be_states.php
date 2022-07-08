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
            ['code' => 'WI', 'name' =>	'Antwerpen'],
            ['code' => 'NI', 'name' =>	'Oost-Vlaanderen'],
            ['code' => 'OB', 'name' =>	'Vlaams-Brabant'],
            ['code' => 'ST', 'name' =>	'West-Vlaanderen'],
            ['code' => 'TI', 'name' =>	'Brussels-Capital Region'],
            ['code' => 'KA', 'name' =>	'Hainaut'],
            ['code' => 'SA', 'name' =>	'Luxembourg'],
            ['code' => 'VO', 'name' =>	'Namur'],
            ['code' => 'BU', 'name' =>	'Walloon Region'],
            ['code' => 'BR', 'name' =>	'Brussels Hoofdstedelijk Gewest']
        ]);
    }
}
