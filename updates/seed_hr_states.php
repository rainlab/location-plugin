<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedHrStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('HR')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'SH', 'name' => 'Središnja Hrvatska'],
            ['code' => 'DA', 'name' => 'Dalmacija'],
            ['code' => 'SL', 'name' => 'Slavonija'],
            ['code' => 'IS', 'name' => 'Istra']
        ]);
    }
}
