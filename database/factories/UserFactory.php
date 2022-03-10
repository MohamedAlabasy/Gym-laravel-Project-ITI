<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'is_verifications' => 1,
            'email_verified_at' => now(),
            'national_id' => $this->faker->numerify('##############'), // "14 Number"
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'gender' => rand(1, 2),
            'profile_image' => $this->faker->imageUrl($width = 200, $height = 200),
            'birth_date' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y/m/d'), // outputs something like 17/09/2001
            'last_login_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'total_sessions' => rand(80, 120),
            'remain_session' => rand(10, 80),
            'city_id' => rand(1, 24),
            'gym_id' => rand(1, 50),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
