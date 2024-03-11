<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedEsStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('ES')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'ES-C', 'name' => "A Coruña (gl) [La Coruña]"],
            ['code' => 'ES-VI', 'name' => "Araba (eu)"],
            ['code' => 'ES-AB', 'name' => "Albacete"],
            ['code' => 'ES-A', 'name' => "Alacant (ca)"],
            ['code' => 'ES-AL', 'name' => "Almería"],
            ['code' => 'ES-O', 'name' => "Asturias"],
            ['code' => 'ES-AV', 'name' => "Ávila"],
            ['code' => 'ES-BA', 'name' => "Badajoz"],
            ['code' => 'ES-PM', 'name' => "Balears (ca) [Baleares]"],
            ['code' => 'ES-B', 'name' => "Barcelona [Barcelona]"],
            ['code' => 'ES-BU', 'name' => "Burgos"],
            ['code' => 'ES-CC', 'name' => "Cáceres"],
            ['code' => 'ES-CA', 'name' => "Cádiz"],
            ['code' => 'ES-S', 'name' => "Cantabria"],
            ['code' => 'ES-CS', 'name' => "Castelló (ca)"],
            ['code' => 'ES-CR', 'name' => "Ciudad Real"],
            ['code' => 'ES-CO', 'name' => "Córdoba"],
            ['code' => 'ES-CU', 'name' => "Cuenca"],
            ['code' => 'ES-GI', 'name' => "Girona (ca) [Gerona]"],
            ['code' => 'ES-GR', 'name' => "Granada"],
            ['code' => 'ES-GU', 'name' => "Guadalajara"],
            ['code' => 'ES-SS', 'name' => "Gipuzkoa (eu)"],
            ['code' => 'ES-H', 'name' => "Huelva"],
            ['code' => 'ES-HU', 'name' => "Huesca"],
            ['code' => 'ES-J', 'name' => "Jaén"],
            ['code' => 'ES-LO', 'name' => "La Rioja"],
            ['code' => 'ES-GC', 'name' => "Las Palmas"],
            ['code' => 'ES-LE', 'name' => "León"],
            ['code' => 'ES-L', 'name' => "Lleida (ca) [Lérida]"],
            ['code' => 'ES-LU', 'name' => "Lugo (gl) [Lugo]"],
            ['code' => 'ES-M', 'name' => "Madrid"],
            ['code' => 'ES-MA', 'name' => "Málaga"],
            ['code' => 'ES-MU', 'name' => "Murcia"],
            ['code' => 'ES-NA', 'name' => "Nafarroa (eu)"],
            ['code' => 'ES-OR', 'name' => "Ourense (gl) [Orense]"],
            ['code' => 'ES-P', 'name' => "Palencia"],
            ['code' => 'ES-PO', 'name' => "Pontevedra (gl) [Pontevedra]"],
            ['code' => 'ES-SA', 'name' => "Salamanca"],
            ['code' => 'ES-TF', 'name' => "Santa Cruz de Tenerife"],
            ['code' => 'ES-SG', 'name' => "Segovia"],
            ['code' => 'ES-SE', 'name' => "Sevilla"],
            ['code' => 'ES-SO', 'name' => "Soria"],
            ['code' => 'ES-T', 'name' => "Tarragona (ca) [Tarragona]"],
            ['code' => 'ES-TE', 'name' => "Teruel"],
            ['code' => 'ES-TO', 'name' => "Toledo"],
            ['code' => 'ES-V', 'name' => "València (ca)"],
            ['code' => 'ES-VA', 'name' => "Valladolid"],
            ['code' => 'ES-BI', 'name' => "Bizkaia (eu)"],
            ['code' => 'ES-ZA', 'name' => "Zamora"],
            ['code' => 'ES-Z', 'name' => "Zaragoza"],
        ]);
    }
}
