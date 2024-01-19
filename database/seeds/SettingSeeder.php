<?php

use App\Enums\KeysEnum;
use App\Setting;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $settings = [
           [
            'key' => 'name',
            'value' => 'Centralized Web-based Information System'
           ],
           [
            'key' => 'logo',
            'value' => $faker->imageUrl(500,500,null,true,null,true)
        ],
        [
            'key' => 'background',
            'value' => $faker->imageUrl(640,480,null,true,null,true)
           ],
        ];
        foreach ($settings as $key => $setting) {
            Setting::create($setting);
        }
    }
}
