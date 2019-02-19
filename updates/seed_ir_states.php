<?php namespace RainLab\Location\Updates;
use October\Rain\Database\Updates\Seeder;
use RainLab\Location\Models\Country;
class SeedIrStates extends Seeder
{
    public function run()
    {
        $ar = Country::whereCode('IR')->first();
        if ($ar->states()->count() > 0) {
            return;
        }
        $ar->states()->createMany([
            [ 'code' => 'WAZ' , 'name' => 'آذربایجان شرقی'],
            [ 'code' => 'EAZ' , 'name' => 'آذربایجان غربی'],
            [ 'code' => 'ARD' , 'name' => 'اردبیل'],
            [ 'code' => 'ESF' , 'name' => 'اصفهان'],
            [ 'code' => 'ALB' , 'name' => 'البرز'],
            [ 'code' => 'ILA' , 'name' => 'ایلام'],
            [ 'code' => 'BUS' , 'name' => 'بوشهر'],
            [ 'code' => 'TEH' , 'name' => 'تهران'],
            [ 'code' => 'CMB' , 'name' => 'چهارمحال و بختیاری'],
            [ 'code' => 'SKH' , 'name' => 'خراسان جنوبی'],
            [ 'code' => 'RKH' , 'name' => 'خراسان رضوی'],
            [ 'code' => 'NKH' , 'name' => 'خراسان شمالی'],
            [ 'code' => 'KUZ' , 'name' => 'خوزستان'],
            [ 'code' => 'ZAN' , 'name' => 'زنجان'],
            [ 'code' => 'SEM' , 'name' => 'سمنان'],
            [ 'code' => 'SIB' , 'name' => 'سیستان و بلوچستان'],
            [ 'code' => 'FAR' , 'name' => 'فارس'],
            [ 'code' => 'GAZ' , 'name' => 'قزوین'],
            [ 'code' => 'GOM' , 'name' => 'قم'],
            [ 'code' => 'KOR' , 'name' => 'کردستان'],
            [ 'code' => 'KER' , 'name' => 'کرمان'],
            [ 'code' => 'KES' , 'name' => 'کرمانشاه'],
            [ 'code' => 'KOB' , 'name' => 'کهگیلویه وبویراحمد'],
            [ 'code' => 'GOL' , 'name' => 'گلستان'],
            [ 'code' => 'GIL' , 'name' => 'گیلان'],
            [ 'code' => 'LOR' , 'name' => 'لرستان'],
            [ 'code' => 'MAZ' , 'name' => 'مازندران'],
            [ 'code' => 'MAR' , 'name' => 'مرکزی'],
            [ 'code' => 'HOR' , 'name' => 'هرمزگان'],
            [ 'code' => 'HAM' , 'name' => 'همدان'],
            [ 'code' => 'YAZ' , 'name' => 'یزد'],
        ]);
    }
}
