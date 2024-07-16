<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerIds = Customer::pluck('id')->toArray();

        return [
            'customer_id' => $this->faker->randomElement($customerIds),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total_amount' => $this->faker->randomFloat(2, 50, 500),
            'billing_name' => $this->faker->name,
            'billing_address' => $this->faker->address,
            'billing_number_phone' => $this->faker->phoneNumber,
            // Add more fields as needed
        ];
    }
}
