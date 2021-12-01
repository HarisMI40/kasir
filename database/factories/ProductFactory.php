<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_barang' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'nama_product' => $this->faker->word(),
            'qty' => $this->faker->numberBetween($min = 1, $max = 20),
            'harga' => $this->faker->numberBetween($min = 1000, $max = 50000),
        ];
    }
}
