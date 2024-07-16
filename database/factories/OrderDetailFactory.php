<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderIds = Order::pluck('id')->toArray();
        $variantIds = ProductVariant::pluck('id')->toArray();

        return [
            'order_id' => $this->faker->randomElement($orderIds),
            'variant_id' => $this->faker->randomElement($variantIds),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 10, 100),
            // Add more fields as needed
        ];
    }
}
