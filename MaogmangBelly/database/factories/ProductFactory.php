<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $price = $this->faker->randomFloat(2, 10, 1000);
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $price,
            'price_10pax' => $price * 10,
            'price_20pax' => $price * 20,
            'stock' => $this->faker->numberBetween(0, 100),
            'total_sold' => $this->faker->numberBetween(0, 100),
            'gallery' => $this->faker->imageUrl(),
            'is_trending' => $this->faker->boolean(),
            'is_featured' => $this->faker->boolean(),
            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
