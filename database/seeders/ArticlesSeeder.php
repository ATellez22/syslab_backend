<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles_list = [[
        	1001,
            'PAN FELIPE x KG',
            6000,
            5500,
            1,
            1,
            2,
            10

        ],[
        	1002,
            'PAN CUARTEL x KG',
            1000,
            500,
            1,
            1,
            2,
            10
        ]];


        Article::truncate();

        foreach ($articles_list as $article) {
            Article::create([
                'barcode' => $article[0],
                'description' => $article[1],
                'price' => $article[2],
                'purchase_price' => $article[3],
                'brand_id' => $article[4],
                'category_id' => $article[5],
                'measure_id' => $article[6],
                'minimum_stock' => $article[7]
            ]);
        }
    }
}



//barcode, description, price, purchase_price, brand_id, category_id, measure_id, minimum_stock, state,

