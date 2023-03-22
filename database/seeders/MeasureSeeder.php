<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Measure;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measures = [
            [
                'description' => 'UNIDAD',
                'code' => 'UN',
            ],
            [
                'description' => 'KILOGRAMO',
                'code' => 'KG',
            ],
            [
                'description' => 'LITRO',
                'code' => 'LT',
            ]
        ];

        Measure::truncate();

        foreach ($measures as $measure) {
            Measure::create($measure);
        }
    }
}
