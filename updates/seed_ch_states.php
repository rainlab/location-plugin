<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedChStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('CH')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AG', 'name' => 'Aargau'],
            ['code' => 'AI', 'name' => 'Appenzell Innerrhoden'],
            ['code' => 'AR', 'name' => 'Appenzell Ausserrhoden'],
            ['code' => 'BE', 'name' => 'Bern'],
            ['code' => 'BL', 'name' => 'Basel-Landschaft'],
            ['code' => 'BS', 'name' => 'Basel-Stadt'],
            ['code' => 'FR', 'name' => 'Fribourg'],
            ['code' => 'GE', 'name' => 'Genève'],
            ['code' => 'GL', 'name' => 'Glarus'],
            ['code' => 'GR', 'name' => 'Graubünden'],
            ['code' => 'JU', 'name' => 'Jura'],
            ['code' => 'LU', 'name' => 'Luzern'],
            ['code' => 'NE', 'name' => 'Neuchâtel'],
            ['code' => 'NW', 'name' => 'Nidwalden'],
            ['code' => 'OW', 'name' => 'Obwalden'],
            ['code' => 'SG', 'name' => 'St. Gallen'],
            ['code' => 'SO', 'name' => 'Solothurn'],
            ['code' => 'SZ', 'name' => 'Schwyz'],
            ['code' => 'TG', 'name' => 'Thurgau'],
            ['code' => 'TI', 'name' => 'Ticino'],
            ['code' => 'UR', 'name' => 'Uri'],
            ['code' => 'VD', 'name' => 'Vaud'],
            ['code' => 'VS', 'name' => 'Valais'],
            ['code' => 'ZG', 'name' => 'Zug'],
            ['code' => 'ZH', 'name' => 'Zürich']
        ]);
    }
}
