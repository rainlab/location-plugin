<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedInStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('IN')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AP', 'name' => 'Andhra Pradesh'],
            ['code' => 'AR', 'name' => 'Arunachal Pradesh'],
            ['code' => 'AS', 'name' => 'Assam'],
            ['code' => 'BR', 'name' => 'Bihar'],
            ['code' => 'CT', 'name' => 'Chhattisgarh'],
            ['code' => 'GA', 'name' => 'Goa'],
            ['code' => 'GJ', 'name' => 'Gujarat'],
            ['code' => 'HR', 'name' => 'Haryana'],
            ['code' => 'HP', 'name' => 'Himachal Pradesh'],
            ['code' => 'JK', 'name' => 'Jammu and Kashmir'],
            ['code' => 'JH', 'name' => 'Jharkhand'],
            ['code' => 'KA', 'name' => 'Karnataka'],
            ['code' => 'KL', 'name' => 'Kerala'],
            ['code' => 'MP', 'name' => 'Madhya Pradesh'],
            ['code' => 'MH', 'name' => 'Maharashtra'],
            ['code' => 'MN', 'name' => 'Manipur'],
            ['code' => 'ML', 'name' => 'Meghalaya'],
            ['code' => 'MZ', 'name' => 'Mizoram'],
            ['code' => 'NL', 'name' => 'Nagaland'],
            ['code' => 'OR', 'name' => 'Odisha'],
            ['code' => 'PB', 'name' => 'Punjab'],
            ['code' => 'RJ', 'name' => 'Rajasthan'],
            ['code' => 'SK', 'name' => 'Sikkim'],
            ['code' => 'TN', 'name' => 'Tamil Nadu'],
            ['code' => 'TG', 'name' => 'Telangana'],
            ['code' => 'TR', 'name' => 'Tripura'],
            ['code' => 'UT', 'name' => 'Uttarakhand'],
            ['code' => 'UP', 'name' => 'Uttar Pradesh'],
            ['code' => 'WB', 'name' => 'West Bengal'],
            ['code' => 'AN', 'name' => 'Andaman and Nicobar Islands'],
            ['code' => 'CH', 'name' => 'Chandigarh'],
            ['code' => 'DN', 'name' => 'Dadra and Nagar Haveli'],
            ['code' => 'DD', 'name' => 'Daman and Diu'],
            ['code' => 'DL', 'name' => 'Delhi'],
            ['code' => 'LD', 'name' => 'Lakshadweep'],
            ['code' => 'PY', 'name' => 'Puducherry']
        ]);
    }
}
