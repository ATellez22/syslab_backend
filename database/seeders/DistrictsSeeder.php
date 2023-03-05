<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            [
                'description' => 'San Pablo',
                'city_id' => 1
            ],
            [
                'description' => 'Terminal',
                'city_id' => 2
            ],
            [
                'description' => 'Las Mercedes',
                'city_id' => 2
            ],
            [
                'description' => 'La Colmena',
                'city_id' => 3
            ],
            [
                'description' => 'Tacuary',
                'city_id' => 3
            ]
        ];

        District::truncate();

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
