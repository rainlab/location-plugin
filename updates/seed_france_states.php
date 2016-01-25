<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedFranceStates extends Seeder
{
    public function run()
    {
        $fr = Country::whereCode('FR')->first();
        $fr->states()->createMany([
            ['code' => 'FR-A', 'name' => 'Alsace'],
            ['code' => 'FR-B', 'name' => 'Aquitaine'],
            ['code' => 'FR-C', 'name' => 'Auvergne'],
            ['code' => 'FR-D', 'name' => 'Basse-Normandie'],
            ['code' => 'FR-E', 'name' => 'Bourgogne'],
            ['code' => 'FR-F', 'name' => 'Bretagne'],
            ['code' => 'FR-G', 'name' => 'Centre – Val de Loire'],
            ['code' => 'FR-H', 'name' => 'Champagne-Ardenne'],
            ['code' => 'FR-I', 'name' => 'Corse'],
            ['code' => 'FR-J', 'name' => 'Franche-Comté'],
            ['code' => 'FR-K', 'name' => 'Haute-Normandie'],
            ['code' => 'FR-L', 'name' => 'Île-de-France'],
            ['code' => 'FR-M', 'name' => 'Languedoc-Roussillon'],
            ['code' => 'FR-N', 'name' => 'Limousin'],
            ['code' => 'FR-O', 'name' => 'Lorraine'],
            ['code' => 'FR-P', 'name' => 'Midi-Pyrénées'],
            ['code' => 'FR-Q', 'name' => 'Nord-Pas-de-Calais'],
            ['code' => 'FR-R', 'name' => 'Pays de la Loire'],
            ['code' => 'FR-S', 'name' => 'Picardie'],
            ['code' => 'FR-T', 'name' => 'Poitou-Charentes'],
            ['code' => 'FR-U', 'name' => 'Provence-Alpes-Côte d\'Azur'],
            ['code' => 'FR-V', 'name' => 'Rhône-Alpes'],
            ['code' => 'FR-GP', 'name' => 'Guadeloupe'],
            ['code' => 'FR-GF', 'name' => 'Guyane (française)'],
            ['code' => 'FR-MQ', 'name' => 'Martinique'],
            ['code' => 'FR-RE', 'name' => 'Réunion'],
            ['code' => 'FR-YT', 'name' => 'Mayotte']
        ]);
    }
}
