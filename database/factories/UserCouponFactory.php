<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCoupon>
 */
class UserCouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::pluck('id')->toArray();
        $couponIds = Coupon::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userId),
            'coupon_id' => $this->faker->randomElement($couponIds),
            'discount_value' => $this->faker->randomFloat(2, 1, 10),
            'used_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            // Add more fields as needed
        ];
    }
}
