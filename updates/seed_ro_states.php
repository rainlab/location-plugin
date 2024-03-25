<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedRoStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('RO')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AB', 'name' => 'Alba'],
            ['code' => 'AR', 'name' => 'Arad'],
            ['code' => 'AG', 'name' => 'Arges'],
            ['code' => 'BC', 'name' => 'Bacău'],
            ['code' => 'BH', 'name' => 'Bihor'],
            ['code' => 'BN', 'name' => 'Bistrita - Nasaud Bistrita'],
            ['code' => 'BT', 'name' => 'Botosani'],
            ['code' => 'BV', 'name' => 'Brasov'],
            ['code' => 'BR', 'name' => 'Braila'],
            ['code' => 'B', 'name' => 'Bucuresti'],
            ['code' => 'BZ', 'name' => 'Buzau'],
            ['code' => 'CS', 'name' => 'Caras - Severin'],
            ['code' => 'CL', 'name' => 'Calarasi'],
            ['code' => 'CJ', 'name' => 'Cluj'],
            ['code' => 'CT', 'name' => 'Constanta'],
            ['code' => 'CV', 'name' => 'Covasna Sfantu Gheorghe'],
            ['code' => 'DB', 'name' => 'Dambovita'],
            ['code' => 'DJ', 'name' => 'Dolj'],
            ['code' => 'GL', 'name' => 'Galati'],
            ['code' => 'GR', 'name' => 'Giurgiu'],
            ['code' => 'GJ', 'name' => 'Gorj'],
            ['code' => 'HR', 'name' => 'Harghita'],
            ['code' => 'HD', 'name' => 'Hunedoara'],
            ['code' => 'IL', 'name' => 'Ialomita'],
            ['code' => 'IS', 'name' => 'Iasi'],
            ['code' => 'IF', 'name' => 'Ilfov'],
            ['code' => 'MM', 'name' => 'Maramures'],
            ['code' => 'MH', 'name' => 'Mehedinti'],
            ['code' => 'MS', 'name' => 'Mures'],
            ['code' => 'NT', 'name' => 'Neamt'],
            ['code' => 'OT', 'name' => 'Olt'],
            ['code' => 'PH', 'name' => 'Prahova Ploiesti'],
            ['code' => 'SM', 'name' => 'Satu Mare'],
            ['code' => 'SJ', 'name' => 'Salaj'],
            ['code' => 'SB', 'name' => 'Sibiu'],
            ['code' => 'SV', 'name' => 'Suceava'],
            ['code' => 'TR', 'name' => 'Teleorman'],
            ['code' => 'TM', 'name' => 'Timis'],
            ['code' => 'TL', 'name' => 'Tulcea'],
            ['code' => 'VS', 'name' => 'Vaslui'],
            ['code' => 'VL', 'name' => 'Valcea'],
            ['code' => 'VN', 'name' => 'Vrancea']
        ]);
    }
}
