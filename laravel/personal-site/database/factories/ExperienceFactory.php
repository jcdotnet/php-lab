<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExperienceType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'experience_type_id'    => ExperienceType::factory(),
            'title'                 => fake()->jobTitle(),
            'company'               => fake()->company(),
            'description'           => fake()->realText(500),
			'start'                 => now(),
        ];
    }
}
