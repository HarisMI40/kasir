<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $products = product::create(
		//         [
		// 			'kode_barang' => 'B001',
		//     		'nama_product' => 'rendang',
		//     		'qty' => 12,
		//     		'harga' => 10000,
		// 		]
		// );

		// $products = product::create(
		//         [
		// 			'kode_barang' => 'B002',
		//     		'nama_product' => 'ayam bakar',
		//     		'qty' => 10,
		//     		'harga' => 20000,
		// 		]
		// );

		product::create(
            [
                'kode_barang' => 'B002',
                'nama_product' => 'teh gelas',
                'qty' => 10,
                'harga' => 1000,
			]);


		product::factory()->count(10)->create();

		 // $table->string('nama_product');
   //          $table->integer('qty');
   //          $table->integer('harga');
    }
}
