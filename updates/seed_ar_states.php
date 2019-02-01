<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedArStates extends Seeder
{
    public function run()
    {
        $ar = Country::whereCode('AR')->first();

        if ($ar->states()->count() > 0) {
            return;
        }

        $ar->states()->createMany([
            ['code' => 'BA', 'name' => 'Buenos Aires'],
            ['code' => 'CA', 'name' => 'Catamarca'],
            ['code' => 'CH', 'name' => 'Chaco'],
            ['code' => 'CT', 'name' => 'Chubut'],
            ['code' => 'CB', 'name' => 'Córdoba'],
            ['code' => 'CR', 'name' => 'Corrientes'],
            ['code' => 'ER', 'name' => 'Entre Ríos'],
            ['code' => 'FO', 'name' => 'Formosa'],
            ['code' => 'JY', 'name' => 'Jujuy'],
            ['code' => 'LP', 'name' => 'La Pampa'],
            ['code' => 'LR', 'name' => 'La Rioja'],
            ['code' => 'MZ', 'name' => 'Mendoza'],
            ['code' => 'MI', 'name' => 'Misiones'],
            ['code' => 'NQ', 'name' => 'Neuquén'],
            ['code' => 'RN', 'name' => 'Río Negro'],
            ['code' => 'SA', 'name' => 'Salta'],
            ['code' => 'SJ', 'name' => 'San Juan'],
            ['code' => 'SL', 'name' => 'San Luis'],
            ['code' => 'SC', 'name' => 'Santa Cruz'],
            ['code' => 'SF', 'name' => 'Santa Fe'],
            ['code' => 'SE', 'name' => 'Santiago del Estero'],
            ['code' => 'TF', 'name' => 'Tierra del Fuego'],
            ['code' => 'TU', 'name' => 'Tucumán'],
        ]);
    }
}
