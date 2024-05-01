<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedUaStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('UA')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'KK', 'name' => 'АР Крим'],
            ['code' => 'KB', 'name' => 'Вінницька область'],
            ['code' => 'KC', 'name' => 'Волинська область'],
            ['code' => 'KE', 'name' => 'Дніпропетровська область'],
            ['code' => 'KH', 'name' => 'Донецька область'],
            ['code' => 'KM', 'name' => 'Житомирська область'],
            ['code' => 'KO', 'name' => 'Закарпатська область'],
            ['code' => 'KP', 'name' => 'Запорізька область'],
            ['code' => 'KT', 'name' => 'Івано-Франківська область'],
            ['code' => 'KA', 'name' => 'Київ'],
            ['code' => 'KI', 'name' => 'Київська область'],
            ['code' => 'HA', 'name' => 'Кіровоградська область'],
            ['code' => 'HB', 'name' => 'Луганська область'],
            ['code' => 'HC', 'name' => 'Львівська область'],
            ['code' => 'HE', 'name' => 'Миколаївська область'],
            ['code' => 'HH', 'name' => 'Одеська область'],
            ['code' => 'HI', 'name' => 'Полтавська область'],
            ['code' => 'HK', 'name' => 'Рівненська область'],
            ['code' => 'IH', 'name' => 'Севастополь'],
            ['code' => 'HM', 'name' => 'Сумська область'],
            ['code' => 'HO', 'name' => 'Тернопільська область'],
            ['code' => 'KX', 'name' => 'Харківська область'],
            ['code' => 'HT', 'name' => 'Херсонська область'],
            ['code' => 'HX', 'name' => 'Хмельницька область'],
            ['code' => 'IA', 'name' => 'Черкаська область'],
            ['code' => 'IE', 'name' => 'Чернівецька область'],
            ['code' => 'IB', 'name' => 'Чернігівська область'],
        ]);
    }
}
