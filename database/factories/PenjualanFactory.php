<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\penjualan;

class penjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = penjualan::class;

    public function definition()
    {
        $tgl =  $this->faker->numberBetween($min = 1, $max = 30);
        $bln =  $this->faker->numberBetween($min = 1, $max = 12);
        $thn =  $this->faker->numberBetween($min = 2021, $max = 2022); 
        return [
            'id' => $this->faker->numberBetween($min = 1, $max = 100),
            'total_qty' => $this->faker->numberBetween($min = 1, $max = 10),
            'total_harga' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'done' => 0,
            'created_at' => $thn."-". $bln."-". $tgl
        ];
    }
}
