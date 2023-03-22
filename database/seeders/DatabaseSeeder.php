<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CitiesSeeder;
use Database\Seeders\CountriesSeeder;
use Database\Seeders\MethodOfPaymentSeeder;
use Database\Seeders\DistrictsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitiesSeeder::class,
            CountriesSeeder::class,
            MethodOfPaymentSeeder::class,
            DistrictsSeeder::class,
            BrandsSeeder::class,
            CategorySeeder::class,
            MeasureSeeder::class
        ]);
    }
}
