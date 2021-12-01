<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\penjualan;
use App\Models\DetailPenjualan;
use App\Models\product;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
     * @return void
     */
    public function run()
    {
        /*
            detailPenjualan::factory -> mengambil dari file DetailPenjualanFactory
            'DetailPenjualan mengambil dari method di model penjualan, DetailPenjualan()'
        */

        // penjualan::factory()
        // ->has(
            
        //     DetailPenjualan::factory()->count(2), 'DetailPenjualan'
            
        //     ) 
        // ->count(2)
        // ->create();

        $product = product::factory()->create();
        penjualan::factory()
            ->has(
                DetailPenjualan::factory()
                ->count(2)
                ->for($product), 'DetailPenjualan'
                ) 
            ->create();

             // penjualan::factory()
        // ->has(
        //     DetailPenjualan::factory()
        //     ->for(product::factory()->state(['id' => '2',]))    
        //     ->create(), 'DetailPenjualan') 
        // ->count(2)
        // ->create();
    }

}
