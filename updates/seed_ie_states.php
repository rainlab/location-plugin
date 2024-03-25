<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedIeStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('IE')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'D', 'name' => 'Dublin'],
            ['code' => 'WW', 'name' => 'Wicklow'],
            ['code' => 'WX', 'name' => 'Wexford'],
            ['code' => 'CW', 'name' => 'Carlow'],
            ['code' => 'KE', 'name' => 'Kildare'],
            ['code' => 'MH', 'name' => 'Meath'],
            ['code' => 'LH', 'name' => 'Louth'],
            ['code' => 'MN', 'name' => 'Monaghan'],
            ['code' => 'CN', 'name' => 'Cavan'],
            ['code' => 'LD', 'name' => 'Longford'],
            ['code' => 'WH', 'name' => 'Westmeath'],
            ['code' => 'OY', 'name' => 'Offaly'],
            ['code' => 'LS', 'name' => 'Laois'],
            ['code' => 'KK', 'name' => 'Kilkenny'],
            ['code' => 'WD', 'name' => 'Waterford'],
            ['code' => 'C', 'name' => 'Cork'],
            ['code' => 'KY', 'name' => 'Kerry'],
            ['code' => 'LK', 'name' => 'Limerick'],
            ['code' => 'TN', 'name' => 'North Tipperary'],
            ['code' => 'TS', 'name' => 'South Tipperary'],
            ['code' => 'CE', 'name' => 'Clare'],
            ['code' => 'G', 'name' => 'Galway'],
            ['code' => 'MO', 'name' => 'Mayo'],
            ['code' => 'RN', 'name' => 'Roscommon'],
            ['code' => 'SO', 'name' => 'Sligo'],
            ['code' => 'LM', 'name' => 'Leitrim'],
            ['code' => 'DL', 'name' => 'Donegal']
        ]);
    }
}
