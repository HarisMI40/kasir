<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\penjualan;
use App\Models\DetailPenjualan;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        penjualan::factory()
            ->has(DetailPenjualan::factory()->count(3), 'DetailPenjualan')
            ->create();
    }

}
