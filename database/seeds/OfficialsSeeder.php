<?php

use App\Model\Barangay;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OfficialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $positions = ['Chairman','Co-Chairman', 'Councilor', 'Treasurer', 'Secretary'];
        $barangays = Barangay::all();
        foreach ($barangays as $key => $barangay) {
            for ($i = 0; $i < 5; $i++) {
                DB::table('officials')->insert([
                    'name' => $faker->name,
                    'position' => $positions[$i],
                    'year' => date('Y',strtotime(now())),
                    'barangay_id' => $barangay->id,
                ]);
            }
        }
    }
}
