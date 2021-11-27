<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan;
use App\Models\penjualan;
use App\Models\product;
use illuminate\Support\Str;

class FactoryDetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $uuid = Str::uuid();
        // $products = DetailPenjualan::create(
		//         [
		//     		'id_product' => product::create()->first(),
		//     		'id_penjualan' =>  penjualan::create()->first(),
		//     		'qty' => 2,
		//     		'sub_total' => 20000,
		// 			'tanggal' => 2021-01-01
		// 		]
		// );

		$products = DetailPenjualan::create(
		        [
		    		'id_product' => product::factory(1)->create()->first(),
		    		'id_penjualan' =>  1,
		    		'qty' => 1,
		    		'sub_total' => 2021-01-01,
				]
		);
    }
}
