<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedEeStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('EE')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'HA', 'name' => 'Harju'],
            ['code' => 'HI', 'name' => 'Hiiu'],
            ['code' => 'IV', 'name' => 'Ida-Viru'],
            ['code' => 'JR', 'name' => 'Jõgeva'],
            ['code' => 'JN', 'name' => 'Järva'],
            ['code' => 'LN', 'name' => 'Lääne'],
            ['code' => 'LV', 'name' => 'Lääne-Viru'],
            ['code' => 'PL', 'name' => 'Põlva'],
            ['code' => 'PR', 'name' => 'Pärnu'],
            ['code' => 'RA', 'name' => 'Rapla'],
            ['code' => 'SA', 'name' => 'Saare'],
            ['code' => 'TA', 'name' => 'Tartu'],
            ['code' => 'VG', 'name' => 'Valga'],
            ['code' => 'VD', 'name' => 'Viljandi'],
            ['code' => 'VR', 'name' => 'Võru']
        ]);
    }
}
