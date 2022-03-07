<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revenue>
 */
class RevenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(10000, 1000000),
            'payment_id' => $this->faker->numerify('##########'), // "16",
            'statuses' => rand(1, 3),
            'visa_number' => $this->faker->numerify('################'), // "16",
            'visa_number' => ('4242 4242 4242 4242'), // "16",
            'payment_method' => $this->faker->randomElement([
                'PayPal', 'Amazon Pay', 'eBay Managed Payments', 'Google Pay', 'Apple Pay',
                'Bank transfers', 'Prepaid cards', 'Digital currencies', 'bank'
            ]),
            'user_id' => rand(123, 222),
            'training_package_id' => rand(1, 10),
        ];
    }
}
