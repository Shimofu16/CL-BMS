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

        $json = file_get_contents(public_path('json/table_barangay.json'));
        $barangays = json_decode($json, true);
        
        foreach ($barangays as $barangay) {
            if ($barangay['municipality_id'] == 411) {
                Barangay::create([
                    'name' => $barangay['barangay_name'],
                ]);
            }
        }

        // Barangays in Calauan, Laguna, Philippines
        // $barangays = [
        //     ['name' => 'Balayhangin'],
        //     ['name' => 'Bangyas'],
        //     ['name' => 'Dayap'],
        //     ['name' => 'Hanggan'],
        //     ['name' => 'Imok'],
        //     ['name' => 'Lamot 1'],
        //     ['name' => 'Lamot 2'],
        //     ['name' => 'Limao'],
        //     ['name' => 'Mabacan'],
        //     ['name' => 'Masiit'],
        //     ['name' => 'Paliparan'],
        //     ['name' => 'Perez'],
        //     ['name' => 'Kanluran'],
        //     ['name' => 'Silangan'],
        //     ['name' => 'Prinza'],
        //     ['name' => 'San Isidro'],
        //     ['name' => 'Santo Tomas'],
        // ];
        // foreach ($barangays as $key => $barangay) {
        //     Barangay::create($barangay);
        // }
    }
}
