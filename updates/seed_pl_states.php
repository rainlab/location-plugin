<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedPlStates extends Seeder
{
    public function run()
    {
        $pl = Country::whereCode('AT')->first();

        if ($pl->states()->count() > 0) {
            return;
        }

        $pl->states()->createMany([
            ['code' => 'WI', 'name' => 'Wielkopolskie'],
            ['code' => 'KP', 'name' => 'Kujawsko-Pomorskie'],
            ['code' => 'MA', 'name' => 'Małopolskie'],
            ['code' => 'LD', 'name' => 'łódzkie'],
            ['code' => 'DO', 'name' => 'Dolnośląskie'],
            ['code' => 'LL', 'name' => 'Lubelskie'],
            ['code' => 'LS', 'name' => 'Lubuskie'],
            ['code' => 'MA', 'name' => 'Mazowieckie'],
            ['code' => 'OP', 'name' => 'Opolskie'],
            ['code' => 'PD', 'name' => 'Podlaskie'],
            ['code' => 'PM', 'name' => 'Pomorskie'],
            ['code' => 'SL', 'name' => 'śląskie'],
            ['code' => 'PO', 'name' => 'Podkarpackie'],
            ['code' => 'SW', 'name' => 'świętokrzyskie'],
            ['code' => 'WM', 'name' => 'Warmińsko-Mazurskie'],
            ['code' => 'BU', 'name' => 'Zachodniopomorskie']
        ]);
    }
}
