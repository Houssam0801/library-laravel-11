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
            'nomlivre' => $this->faker->words(rand(1, 3), true), // Generates 1, 2, or 3 words as book title
            'nomauteur' => $this->faker->name, // Generates an author's name
            'description' => $this->faker->paragraph, // Generates a paragraph of description
            'date_pub' => $this->faker->date('Y-m-d'), // Generates a random publication date
            'categorie_id' => $this->faker->numberBetween(11, 19), // Random category ID between 11 and 19
        ];
    }
}
