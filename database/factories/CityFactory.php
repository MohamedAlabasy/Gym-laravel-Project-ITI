<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name(),
            'name' => $this->faker->randomElement([
                'Damietta', 'Alexandria', ' Aswan', 'Asyut', 'Beheira', 'Beni Suef', 'Cairo', 'Dakahlia', 'Faiyum', 'Gharbia',
                'Giza', 'Ismailia', 'Kafr El-Sheikh', 'Luxor', ' Matruh', 'Minya', 'Monufia',
                'Sinai', 'Port', 'Said', 'Qalyubia', ' Qena', 'Sharqia', 'Sohag'
            ]),
        ];
    }
}
