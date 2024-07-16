<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = Product::pluck('id')->toArray();
        $sizeIds = Size::pluck('id')->toArray();
        $colorIds = Color::pluck('id')->toArray();

        return [
            'product_id' => $this->faker->randomElement($productIds),
            'size_id' => $this->faker->randomElement($sizeIds),
            'color_id' => $this->faker->randomElement($colorIds),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            // Add more fields as needed
        ];
    }
}
