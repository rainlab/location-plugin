<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedMxStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('MX')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ["code" => "MX-AGU", "name" => "Aguascalientes"],
            ["code" => "MX-BCN", "name" => "Baja California"],
            ["code" => "MX-BCS", "name" => "Baja California Sur"],
            ["code" => "MX-CAM", "name" => "Campeche"],
            ["code" => "MX-CHP", "name" => "Chiapas"],
            ["code" => "MX-CHH", "name" => "Chihuahua"],
            ["code" => "MX-COA", "name" => "Coahuila"],
            ["code" => "MX-COL", "name" => "Colima"],
            ["code" => "MX-CMX​", "name" => "Ciudad de México"],
            ["code" => "MX-DUR", "name" => "Durango"],
            ["code" => "MX-GUA", "name" => "Guanajuato"],
            ["code" => "MX-GRO", "name" => "Guerrero"],
            ["code" => "MX-HID", "name" => "Hidalgo"],
            ["code" => "MX-JAL", "name" => "Jalisco"],
            ["code" => "MX-MEX", "name" => "Estado de México"],
            ["code" => "MX-MIC", "name" => "Michoacán"],
            ["code" => "MX-MOR", "name" => "Morelos"],
            ["code" => "MX-NAY", "name" => "Nayarit"],
            ["code" => "MX-NLE", "name" => "Nuevo León"],
            ["code" => "MX-OAX", "name" => "Oaxaca"],
            ["code" => "MX-PUE", "name" => "Puebla"],
            ["code" => "MX-QUE", "name" => "Querétaro"],
            ["code" => "MX-ROO", "name" => "Quintana Roo"],
            ["code" => "MX-SLP", "name" => "San Luis Potosí"],
            ["code" => "MX-SIN", "name" => "Sinaloa"],
            ["code" => "MX-SON", "name" => "Sonora"],
            ["code" => "MX-TAB", "name" => "Tabasco"],
            ["code" => "MX-TAM", "name" => "Tamaulipas"],
            ["code" => "MX-TLA", "name" => "Tlaxcala"],
            ["code" => "MX-VER", "name" => "Veracruz"],
            ["code" => "MX-YUC", "name" => "Yucatán"],
            ["code" => "MX-ZAC", "name" => "Zacatecas"]
        ]);
    }
}
