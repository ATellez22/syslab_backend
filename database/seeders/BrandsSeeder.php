<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand_list = [
            'PRODUCTO INTERNO',
        	'PARMALAT',
            'STABILO',
            'OCEAN',
            'FABER-CASTELL',
        	'DE LA COSTA',
            'MUNICH',
            'BENGALA',
        	'BUDWEISER',
            'KOLKE'
        ];

        Brand::truncate();

        foreach ($brand_list as $brand) {
        	Brand::create(['description' => $brand]);
        }
    }
}
