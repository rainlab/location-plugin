<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedHrStates extends Seeder
{
    public function run()
    {
        $hr = Country::whereCode('HR')->first();

        if ($hr->states()->count() > 0) {
            return;
        }

        $hr->states()->createMany([
            ['code' => 'SH', 'name' => 'Središnja Hrvatska'],
            ['code' => 'DA', 'name' => 'Dalmacija'],
            ['code' => 'SL', 'name' => 'Slavonija'],
            ['code' => 'IS', 'name' => 'Istra']
        ]);
    }
}
