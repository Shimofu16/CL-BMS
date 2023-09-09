<?php

use App\Model\Barangay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed barangay with jason file

        $barangays = [
            ['name' => 'Balayhangin'],
            ['name' => 'Bangyas'],
            ['name' => 'Dayap'],
            ['name' => 'Hanggan'],
            ['name' => 'Imok'],
            ['name' => 'Kanluran (Pob.)'],
            ['name' => 'Lamot 1'],
            ['name' => 'Lamot 2'],
            ['name' => 'Limao'],
            ['name' => 'Mabacan'],
            ['name' => 'Masiit'],
            ['name' => 'Paliparan'],
            ['name' => 'Perez'],
            ['name' => 'Prinza'],
            ['name' => 'San Isidro'],
            ['name' => 'Santo Tomas'],
            ['name' => 'Silangan (Pob.)'],
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
