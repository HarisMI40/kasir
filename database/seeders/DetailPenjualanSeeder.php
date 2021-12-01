<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan;
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
    	// $uuid = Str::uuid();
        // $products = DetailPenjualan::create(
		//         [
		//     		'id_product' => 1,
		//     		'id_penjualan' => 1,
		//     		'qty' => 2,
		//     		'sub_total' => 20000,
		// 		]
		// );

		// $products = DetailPenjualan::create(
		//         [
		//     		'id_product' => 2,
		//     		'id_penjualan' => 1,
		//     		'qty' => 1,
		//     		'sub_total' => 20000,
		// 		]
		// );

		DetailPenjualan::factory()->count(20)->create();
    }
}
