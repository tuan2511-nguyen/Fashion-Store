<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        return [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'category_id' => $this->faker->randomElement($categoryIds),
            'image' => $this->faker->imageUrl,
        ];
    }
}
