<?php

use App\Model\Barangay;
use App\Model\Purok;
use Illuminate\Database\Seeder;

class PurokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangays = Barangay::all();
        foreach ($barangays as $key => $barangay) {
            for ($i = 0; $i < 6; $i++) {
                Purok::create([
                    'name' => 'Purok ' . $i + 1,
                    'barangay_id' => $barangay->id
                ]);
            }
        }
    }
}
