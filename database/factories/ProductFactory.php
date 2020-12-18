<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'image_path' => 'images/Wy7KMsnNF1ttyW3woqpAKpzQrAtjjjMM5jkZL0OP.jpg',
            'price' => $this->faker->numberBetween($min = 100, $max = 900),
            'due_date' => $this->faker->date($format = '2021-m-d H:i:s'),
        ];
    }
}
