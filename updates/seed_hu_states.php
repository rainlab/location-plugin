<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedHuStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('HU')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'BUD', 'name' => 'Budapest'],
            ['code' => 'BAR', 'name' => 'Baranya'],
            ['code' => 'BKM', 'name' => 'Bács-Kiskun'],
            ['code' => 'BEK', 'name' => 'Békés'],
            ['code' => 'BAZ', 'name' => 'Borsod-Abaúj-Zemplén'],
            ['code' => 'CSO', 'name' => 'Csongrád'],
            ['code' => 'FEJ', 'name' => 'Fejér'],
            ['code' => 'GMS', 'name' => 'Győr-Moson-Sopron'],
            ['code' => 'HBM', 'name' => 'Hajdú-Bihar'],
            ['code' => 'HEV', 'name' => 'Heves'],
            ['code' => 'JNS', 'name' => 'Jász-Nagykun-Szolnok'],
            ['code' => 'KEM', 'name' => 'Komárom-Esztergom'],
            ['code' => 'NOG', 'name' => 'Nógrád'],
            ['code' => 'PES', 'name' => 'Pest'],
            ['code' => 'SOM', 'name' => 'Somogy'],
            ['code' => 'SSB', 'name' => 'Szabolcs-Szatmár-Bereg'],
            ['code' => 'TOL', 'name' => 'Tolna'],
            ['code' => 'VAS', 'name' => 'Vas'],
            ['code' => 'VES', 'name' => 'Veszprém'],
            ['code' => 'ZAL', 'name' => 'Zala']
        ]);
    }
}
