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
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'featured' => false,
            'details' => $this->faker->sentence(8),
            'price' => $this->faker->numberBetween(1000, 500000),
            'description' => $this->faker->paragraph,
            'image' => 'products/dummy/laptop-1.jpg',
            'images' => '["products\/dummy\/laptop-2.jpg", "products\/dummy\/laptop-3.jpg", "products\/dummy\/laptop-4.jpg"]',
            'quantity' => 10,
        ];
    }
}
