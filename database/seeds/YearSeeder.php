<?php

use App\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'year' => '2018-2020',
                'isCurrentYear' => true,
            ],
            [
                'year' => '2021-2024',
            ],
            
        ];
        foreach ($data as $key => $value) {
            Year::create($value);
        }
    }
}
