<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
use Faker\Generator as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = product::create(
		        [
					'kode_barang' => $faker->numberBetween($min = 1000, $max = 9000),
		    		'nama_product' => $faker->word(),
		    		'qty' => $faker->numberBetween($min = 1, $max = 20),
		    		'harga' => $faker->numberBetween($min = 1000, $max = 10000),
				]
		);

		// $products = product::create(
		//         [
		// 			'kode_barang' => 'B002',
		//     		'nama_product' => 'ayam bakar',
		//     		'qty' => 10,
		//     		'harga' => 20000,
		// 		]
		// );

		 // $table->string('nama_product');
   //          $table->integer('qty');
   //          $table->integer('harga');
    }
}
