<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
use App\Models\penjualan;
use App\Models\DetailPenjualan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            PenjualanSeeder::class,
            DetailPenjualanSeeder::class,
            UserSeeder::class
        ]);
    }
}
