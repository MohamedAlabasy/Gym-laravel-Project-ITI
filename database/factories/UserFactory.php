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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [


            // $faker->numerify'###-###-####'), "766-620-7004"




            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'is_verifications' => 1,
            // 'email_verified_at' => now(),
            // 'national_id' => $this->faker->numerify('##########'), // "3579786681"
            // 'password' => bcrypt('123456'),
            // 'remember_token' => Str::random(10),
            // 'gender' => rand(1, 2),
            // 'profile_image' => $this->faker->text(200),
            // 'birth_date' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'), // outputs something like 17/09/2001
            // 'last_login_at' => now(),




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
