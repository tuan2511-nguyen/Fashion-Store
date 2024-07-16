<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\Customer;
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
        $customerIds = Customer::pluck('id')->toArray();
        $couponIds = Coupon::pluck('id')->toArray();

        return [
            'customer_id' => $this->faker->randomElement($customerIds),
            'coupon_id' => $this->faker->randomElement($couponIds),
            'discount_value' => $this->faker->randomFloat(2, 1, 10),
            'used_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            // Add more fields as needed
        ];
    }
}
