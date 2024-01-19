<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                SettingSeeder::class,
                BarangaySeeder::class,
                PurokSeeder::class,
                YearSeeder::class,
                OfficialsSeeder::class,
                UserSeeder::class,
            ]);

    }
}
