<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rate>
 */
class rateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate'=>rand(1,5),
            'patient_id'=>rand(1,5),
            'doctor_id'=>rand(1,5)

         ];
    }
}
