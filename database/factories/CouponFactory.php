<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coupon_code' => $this->faker->unique()->word,
            'discount_type' => 'fixed_amount',
            'discount_value' => $this->faker->randomFloat(2, 5, 50),
            'expiration_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            // Add more fields as needed
        ];
    }
}
