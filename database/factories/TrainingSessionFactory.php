<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingSession>
 */
class TrainingSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'day' => $this->faker->dateTimeBetween('0 days', '+120 days'),
            // 'starts_at' => $this->faker->time('H_i_s'),
            // 'finishes_at' => $this->faker->time('H_i_s'),
            'starts_at' => '09:30:00',
            'finishes_at' => '12:30:00',
            'training_package_id' => rand(1, 10),
        ];
    }
}
