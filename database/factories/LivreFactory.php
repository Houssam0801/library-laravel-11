<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomlivre' => $this->faker->words(rand(1, 3), true),
            'nomauteur' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'date_pub' => $this->faker->date('Y-m-d'),
            'categorie_id' => $this->faker->numberBetween(11, 19),
        ];
    }
}
