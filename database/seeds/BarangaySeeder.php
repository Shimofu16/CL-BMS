<?php

use App\Barangay;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for barangays in Calauan, Laguna, Philippines
        $barangays = [
            ['name' => 'Lamot 1'],
            ['name' => 'Lamot 2'],
            ['name' => 'Dayap'],
            ['name' => 'Masiit'],
            ['name' => 'San Isidro'],
            ['name' => 'San Isidro'],
            // Add more barangays as needed
        ];
        foreach ($barangays as $key => $barangay) {
            Barangay::create($barangay);
        }
    }
}
