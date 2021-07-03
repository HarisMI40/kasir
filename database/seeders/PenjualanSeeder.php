<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\penjualan;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = penjualan::create(
		        [
		    		'total_qty' => 3,
		    		'total_harga' => 40000
				]
		);
    }

}
