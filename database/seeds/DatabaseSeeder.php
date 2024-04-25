<?php

use App\User;
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
        // User::create([
        //     'email' => 'admin@app.com',
        //     'name' => 'Administrator',
        //     'password' => Hash::make('password'),
        //     'role' => 'Admin',
        // ]);

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
