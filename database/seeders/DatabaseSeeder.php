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
        // \App\Models\User::factory(10)->create();

        $this->call([
	        PenjualanSeeder::class,
            ProductSeeder::class,
            PenjualanSeeder::class
            // DetailPenjualan::factory()->count(20)->create()


	       
            // UserSeeder::class
        ]);
    }
}
