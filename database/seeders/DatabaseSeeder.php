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

        $product = product::factory()->create();
        
        penjualan::factory()
            ->has( DetailPenjualan::factory()->count(2), 'DetailPenjualan' ) 
            ->create();

        $this->call([
            // ProductSeeder::class,
            // PenjualanSeeder::class,
            // DetailPenjualanSeeder::class
            // DetailPenjualan::factory()->count(20)->create()
            // UserSeeder::class
        ]);
    }
}
