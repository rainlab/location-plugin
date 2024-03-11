<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedAuStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('AU')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'NSW', 'name' => 'New South Wales'],
            ['code' => 'QLD', 'name' => 'Queensland'],
            ['code' => 'SA', 'name' => 'South Australia'],
            ['code' => 'TAS', 'name' => 'Tasmania'],
            ['code' => 'VIC', 'name' => 'Victoria'],
            ['code' => 'WA', 'name' => 'Western Australia'],
            ['code' => 'NT', 'name' => 'Northern Territory'],
            ['code' => 'ACT', 'name' => 'Australian Capital Territory']
        ]);
    }
}
