<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userId),
            'product_id' => $this->faker->randomElement($productIds),
            'rating' => $this->faker->numberBetween(1, 5),
            'comments'=>$this->faker->paragraph,
        ];
    }
}
