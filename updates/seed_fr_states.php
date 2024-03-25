<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedFrStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('FR')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'ARA',  'name' => 'Auvergne-Rhône-Alpes'],
            ['code' => 'BFC',  'name' => 'Bourgogne-Franche-Comté'],
            ['code' => 'BZH',  'name' => 'Bretagne'],
            ['code' => 'CVL',  'name' => 'Centre–Val-de-Loire'],
            ['code' => 'COR',  'name' => 'Corse'],
            ['code' => 'GP',   'name' => 'Guadeloupe'],
            ['code' => 'GF',   'name' => 'Guyane'],
            ['code' => 'GE',   'name' => 'Grand-Est'],
            ['code' => 'HF',   'name' => 'Hauts-de-France'],
            ['code' => 'IDF',  'name' => 'Île-de-France'],
            ['code' => 'MQ',   'name' => 'Martinique'],
            ['code' => 'YT',   'name' => 'Mayotte'],
            ['code' => 'NOR',  'name' => 'Normandie'],
            ['code' => 'PL',   'name' => 'Pays-de-la-Loire'],
            ['code' => 'NA',   'name' => 'Nouvelle-Aquitaine'],
            ['code' => 'OCC',  'name' => 'Occitanie'],
            ['code' => 'PACA', 'name' => 'Provence-Alpes-Côte-d\'Azur'],
            ['code' => 'RE',   'name' => 'Réunion'],
        ]);
    }
}
