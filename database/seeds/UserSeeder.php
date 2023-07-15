<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'devmrksss@gmail.com',
            'name' => 'Mark Bautista',
            'password' => Hash::make('password'),
        ]);
    }
}
