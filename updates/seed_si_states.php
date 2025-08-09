<?php

namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedSiStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('SI')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'DO', 'name' => 'Dolenjska'],
            ['code' => 'GO', 'name' => 'Gorenjska'],
            ['code' => 'SP', 'name' => 'Goriška'],
            ['code' => 'KO', 'name' => 'Koroška'],
            ['code' => 'NO', 'name' => 'Notranjsko-kraška'],
            ['code' => 'JP', 'name' => 'Obalno-kraška'],
            ['code' => 'LJ', 'name' => 'Osrednjeslovenska'],
            ['code' => 'PD', 'name' => 'Podravska'],
            ['code' => 'PM', 'name' => 'Pomurska'],
            ['code' => 'SA', 'name' => 'Savinjska'],
            ['code' => 'PS', 'name' => 'Spodnjeposavska'],
            ['code' => 'ZS', 'name' => 'Zasavska'],
        ]);
    }
}
