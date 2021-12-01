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

        penjualan::create(
            [
                'id' => 1,
                'total_qty' => 5,
                'total_harga' => 10000,
                'done' => 1,
                'created_at' => "2021-12-1"
            ]
        );
        penjualan::create(
            [
                'id' => 2,
                'total_qty' => 5,
                'total_harga' => 15000,
                'done' => 1,
                'created_at' => "2021-11-1"
            ]
        );
    }

}
