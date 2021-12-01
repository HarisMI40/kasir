<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailPenjualan;

class DetailPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = DetailPenjualan::class;

    public function definition()
    {
        return [
            'id_product' => $this->faker->numberBetween($min = 1, $max = 100),
            'id_penjualan' => 2,
            'qty' =>10,
            'sub_total' => 10000
        ];

        
    }
}
