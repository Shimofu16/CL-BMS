<?php

use App\Model\Barangay;
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
        // Barangays in Calauan, Laguna, Philippines
        $barangays = [
            ['name' => 'Balayhangin'],
            ['name' => 'Bangyas'],
            ['name' => 'Dayap'],
            ['name' => 'Hanggan'],
            ['name' => 'Imok'],
            ['name' => 'Lamot 1'],
            ['name' => 'Lamot 2'],
            ['name' => 'Limao'],
            ['name' => 'Mabacan'],
            ['name' => 'Masiit'],
            ['name' => 'Paliparan'],
            ['name' => 'Perez'],
            ['name' => 'Kanluran'],
            ['name' => 'Silangan'],
            ['name' => 'Prinza'],
            ['name' => 'San Isidro'],
            ['name' => 'Santo Tomas'],
        ];
        foreach ($barangays as $key => $barangay) {
            Barangay::create($barangay);
        }
    }
}
