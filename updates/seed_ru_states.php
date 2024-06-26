<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedRuStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('RU')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AD', 'name' => 'Респ Адыгея'],
            ['code' => 'BA', 'name' => 'Респ Башкортостан'],
            ['code' => 'BU', 'name' => 'Респ Бурятия'],
            ['code' => 'AL', 'name' => 'Респ Алтай'],
            ['code' => 'DA', 'name' => 'Респ Дагестан'],
            ['code' => 'IN', 'name' => 'Респ Ингушетия'],
            ['code' => 'KB', 'name' => 'Респ Кабардино-Балкарская'],
            ['code' => 'KL', 'name' => 'Респ Калмыкия'],
            ['code' => 'KC', 'name' => 'Респ Карачаево-Черкесская'],
            ['code' => 'KR', 'name' => 'Респ Карелия'],
            ['code' => 'KO', 'name' => 'Респ Коми'],
            ['code' => 'ME', 'name' => 'Респ Марий Эл'],
            ['code' => 'MO', 'name' => 'Респ Мордовия'],
            ['code' => 'SA', 'name' => 'Респ Саха /Якутия/'],
            ['code' => 'SE', 'name' => 'Респ Северная Осетия - Алания'],
            ['code' => 'TA', 'name' => 'Респ Татарстан'],
            ['code' => 'TY', 'name' => 'Респ Тыва'],
            ['code' => 'UD', 'name' => 'Респ Удмуртская'],
            ['code' => 'KK', 'name' => 'Респ Хакасия'],
            ['code' => 'CE', 'name' => 'Респ Чеченская'],
            ['code' => 'CU', 'name' => 'Чувашская Республика - Чувашия'],
            ['code' => 'ALT', 'name' => 'Алтайский край'],
            ['code' => 'KDA', 'name' => 'Краснодарский край'],
            ['code' => 'KYA', 'name' => 'Красноярский край'],
            ['code' => 'PRI', 'name' => 'Приморский край'],
            ['code' => 'STA', 'name' => 'Ставропольский край'],
            ['code' => 'KHA', 'name' => 'Хабаровский край'],
            ['code' => 'AMU', 'name' => 'Амурская обл'],
            ['code' => 'ARK', 'name' => 'Архангельская обл'],
            ['code' => 'AST', 'name' => 'Астраханская обл'],
            ['code' => 'BEL', 'name' => 'Белгородская обл'],
            ['code' => 'BRY', 'name' => 'Брянская обл'],
            ['code' => 'VLA', 'name' => 'Владимирская обл'],
            ['code' => 'VGG', 'name' => 'Волгоградская обл'],
            ['code' => 'VLG', 'name' => 'Вологодская обл'],
            ['code' => 'VOR', 'name' => 'Воронежская обл'],
            ['code' => 'IVA', 'name' => 'Ивановская обл'],
            ['code' => 'IRK', 'name' => 'Иркутская обл'],
            ['code' => 'KGD', 'name' => 'Калининградская обл'],
            ['code' => 'KLU', 'name' => 'Калужская обл'],
            ['code' => 'KAM', 'name' => 'Камчатский край'],
            ['code' => 'KEM', 'name' => 'Кемеровская область - Кузбасс'],
            ['code' => 'KIR', 'name' => 'Кировская обл'],
            ['code' => 'KOS', 'name' => 'Костромская обл'],
            ['code' => 'KGN', 'name' => 'Курганская обл'],
            ['code' => 'KRS', 'name' => 'Курская обл'],
            ['code' => 'LEN', 'name' => 'Ленинградская обл'],
            ['code' => 'LIP', 'name' => 'Липецкая обл'],
            ['code' => 'MAG', 'name' => 'Магаданская обл'],
            ['code' => 'MOS', 'name' => 'Московская обл'],
            ['code' => 'MUR', 'name' => 'Мурманская обл'],
            ['code' => 'NIZ', 'name' => 'Нижегородская обл'],
            ['code' => 'NGR', 'name' => 'Новгородская обл'],
            ['code' => 'NVS', 'name' => 'Новосибирская обл'],
            ['code' => 'OMS', 'name' => 'Омская обл'],
            ['code' => 'ORE', 'name' => 'Оренбургская обл'],
            ['code' => 'ORL', 'name' => 'Орловская обл'],
            ['code' => 'PNZ', 'name' => 'Пензенская обл'],
            ['code' => 'PER', 'name' => 'Пермский край'],
            ['code' => 'PSK', 'name' => 'Псковская обл'],
            ['code' => 'ROS', 'name' => 'Ростовская обл'],
            ['code' => 'RYA', 'name' => 'Рязанская обл'],
            ['code' => 'SAM', 'name' => 'Самарская обл'],
            ['code' => 'SAR', 'name' => 'Саратовская обл'],
            ['code' => 'SAK', 'name' => 'Сахалинская обл'],
            ['code' => 'SVE', 'name' => 'Свердловская обл'],
            ['code' => 'SMO', 'name' => 'Смоленская обл'],
            ['code' => 'TAM', 'name' => 'Тамбовская обл'],
            ['code' => 'TVE', 'name' => 'Тверская обл'],
            ['code' => 'TOM', 'name' => 'Томская обл'],
            ['code' => 'TUL', 'name' => 'Тульская обл'],
            ['code' => 'TYU', 'name' => 'Тюменская обл'],
            ['code' => 'ULY', 'name' => 'Ульяновская обл'],
            ['code' => 'CHE', 'name' => 'Челябинская обл'],
            ['code' => 'ZAB', 'name' => 'Забайкальский край'],
            ['code' => 'YAR', 'name' => 'Ярославская обл'],
            ['code' => 'MOW', 'name' => 'г Москва'],
            ['code' => 'SPE', 'name' => 'г Санкт-Петербург'],
            ['code' => 'YEV', 'name' => 'Еврейская Аобл'],
            ['code' => 'NEN', 'name' => 'Ненецкий АО'],
            ['code' => 'KHM', 'name' => 'Ханты-Мансийский Автономный округ - Югра АО'],
            ['code' => 'CHU', 'name' => 'Чукотский АО'],
            ['code' => 'YAN', 'name' => 'Ямало-Ненецкий АО'],
            ['code' => '43', 'name' => 'Респ Крым'],
            ['code' => '40', 'name' => 'г Севастополь'],
            ['code' => 'BAY', 'name' => 'г Байконур']
        ]);
    }
}
