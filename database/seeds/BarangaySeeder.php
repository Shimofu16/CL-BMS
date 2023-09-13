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
            [
                'name' => 'Balayhangin',
                'logo' => 'uploads/barangay-logos/balayhangin.png',
            ],
            [
                'name' => 'Bangyas'
            ],
            [
                'name' => 'Dayap',
                'logo' => 'uploads/barangay-logos/dayap.png',
            ],
            [
                'name' => 'Hanggan',
                'logo' => 'uploads/barangay-logos/hanggan.png',
            ],
            [
                'name' => 'Imok',
                'logo' => 'uploads/barangay-logos/imok.png',
            ],
            [
                'name' => 'Kanluran (Pob.)',
                'logo' => 'uploads/barangay-logos/kanluran.png',
            ],
            [
                'name' => 'Lamot 1',
                'logo' => 'uploads/barangay-logos/lamot_1.png',
            ],
            [
                'name' => 'Lamot 2',
                'logo' => 'uploads/barangay-logos/lamot_2.png',
            ],
            [
                'name' => 'Limao',
                'logo' => 'uploads/barangay-logos/limao.png',
            ],
            [
                'name' => 'Mabacan',
                'logo' => 'uploads/barangay-logos/mabacan.png',
            ],
            [
                'name' => 'Masiit',
                'logo' => 'uploads/barangay-logos/masiit.png',
            ],
            [
                'name' => 'Paliparan',
                'logo' => 'uploads/barangay-logos/paliparan.png',
            ],
            [
                'name' => 'Perez',
            ],
            [
                'name' => 'Prinza',
                'logo' => 'uploads/barangay-logos/prinza.png',
            ],
            [
                'name' => 'San Isidro',
                'logo' => 'uploads/barangay-logos/san_isidro.png',
            ],
            [
                'name' => 'Santo Tomas',
                'logo' => 'uploads/barangay-logos/santo_tomas.png',
            ],
            [
                'name' => 'Silangan (Pob.)',
                'logo' => 'uploads/barangay-logos/silangan.png',
            ],
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
