<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_list = [
        	'PANIFICADOS', 'JUGUETES', 'LIMPIEZA', 'LACTEOS', 'ELECTRÓNICA',
        	'INFORMÁTICA', 'BEBIDAS', 'CARNES',
        	'EMBUTIDOS'
        ];

        Category::truncate();

        foreach ($category_list as $categories) {
        	Category::create(['description' => $categories]);
        }
    }
}
