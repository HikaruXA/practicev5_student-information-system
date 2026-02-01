<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startYear = $this->faker->numberBetween(2020, 2025);
        $endYear = $startYear + 1;

        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'school_year' => "{$startYear}-{$endYear}",
        ];
    }
}
