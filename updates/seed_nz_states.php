<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedNzStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('NZ')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'NTL', 'name' => "Northland"],
            ['code' => 'AUK', 'name' => "Auckland"],
            ['code' => 'WKO', 'name' => "Waikato"],
            ['code' => 'BOP', 'name' => "Bay of Plenty"],
            ['code' => 'GIS', 'name' => "Gisborne"],
            ['code' => 'HKB', 'name' => "Hawke's Bay"],
            ['code' => 'TKI', 'name' => "Taranaki"],
            ['code' => 'MWT', 'name' => "Manawatu-Wanganui"],
            ['code' => 'WGN', 'name' => "Wellington"],
            ['code' => 'TAS', 'name' => "Tasman"],
            ['code' => 'NSN', 'name' => "Nelson"],
            ['code' => 'MBH', 'name' => "Marlborough"],
            ['code' => 'WTC', 'name' => "West Coast"],
            ['code' => 'CAN', 'name' => "Canterbury"],
            ['code' => 'OTA', 'name' => "Otago Otago"],
            ['code' => 'STL', 'name' => "Southland"],
        ]);
    }
}
