<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {

        $cities = [
        	[
				'description' => 'Belen'
			],
			[
				'description' => 'Concepcion'
			],
			[
				'description' => 'Horqueta'
			],
			[
				'description' => 'Loreto',
			],
			[
				'description' => 'Paso Barreto',
			]
        ];

        City::truncate();

        foreach ($cities as $city) {
        	City::create($city);
        }

    }
}
