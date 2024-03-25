<?php namespace RainLab\Location\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;

class SeedBrStates extends Seeder
{
    public function run()
    {
        $country = Country::whereCode('BR')->first();
        if ($country->states()->count() > 0) {
            return;
        }

        $country->states()->createMany([
            ['code' => 'AC', 'name' => 'Acre'],
            ['code' => 'AL', 'name' => 'Alagoas'],
            ['code' => 'AP', 'name' => 'Amapá'],
            ['code' => 'AM', 'name' => 'Amazonas'],
            ['code' => 'BA', 'name' => 'Bahia'],
            ['code' => 'CE', 'name' => 'Ceará'],
            ['code' => 'DF', 'name' => 'Distrito Federal'],
            ['code' => 'ES', 'name' => 'Espírito Santo'],
            ['code' => 'GO', 'name' => 'Goiás'],
            ['code' => 'MA', 'name' => 'Maranhão'],
            ['code' => 'MT', 'name' => 'Mato Grosso'],
            ['code' => 'MS', 'name' => 'Mato Grosso do Sul'],
            ['code' => 'MG', 'name' => 'Minas Gerais'],
            ['code' => 'PA', 'name' => 'Pará'],
            ['code' => 'PB', 'name' => 'Paraíba'],
            ['code' => 'PR', 'name' => 'Paraná'],
            ['code' => 'PE', 'name' => 'Pernambuco'],
            ['code' => 'PI', 'name' => 'Piauí'],
            ['code' => 'RJ', 'name' => 'Rio de Janeiro'],
            ['code' => 'RN', 'name' => 'Rio Grande do Norte'],
            ['code' => 'RS', 'name' => 'Rio Grande do Sul'],
            ['code' => 'RO', 'name' => 'Rondônia'],
            ['code' => 'RR', 'name' => 'Roraima'],
            ['code' => 'SC', 'name' => 'Santa Catarina'],
            ['code' => 'SP', 'name' => 'São Paulo'],
            ['code' => 'SE', 'name' => 'Sergipe'],
            ['code' => 'TO', 'name' => 'Tocantins']
        ]);
    }
}
