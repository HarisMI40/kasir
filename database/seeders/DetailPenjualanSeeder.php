<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan;
use App\Models\product;
use illuminate\Support\Str;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DetailPenjualan::create(
			[
				'id_product' => "B001",
				'id_penjualan' => 1,
				'qty' => 5,
				'sub_total' => 10000
			]
		);

		DetailPenjualan::create(
			[
				'id_product' => "B002",
				'id_penjualan' => 2,
				'qty' => 5,
				'sub_total' => 15000
			]
		);
    }
}
