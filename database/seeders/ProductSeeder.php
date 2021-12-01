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
		product::create(
            [
                'kode_barang' => 'B001',
                'nama_product' => 'Richees Nabati',
                'qty' => 10,
                'harga' => 2000,
			]);

		product::create(
			[
				'kode_barang' => 'B002',
				'nama_product' => 'Indomie Goreng',
				'qty' => 10,
				'harga' => 3000,
			]);

		product::create(
			[
				'kode_barang' => 'B003',
				'nama_product' => 'Mie Sedap Goreng',
				'qty' => 10,
				'harga' => 3000,
			]);

		product::create(
			[
				'kode_barang' => 'B004',
				'nama_product' => 'Sabun Nuvo Merah',
				'qty' => 10,
				'harga' => 4000,
			]);

		product::create(
			[
				'kode_barang' => 'B005',
				'nama_product' => 'Sabun Nuvo Kuning',
				'qty' => 10,
				'harga' => 4000,
			]);

		// product::factory()->count(10)->create();
    }
}
