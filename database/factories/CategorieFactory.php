<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomcategorie' => $this->faker->randomElement([
            'Science Fiction', 'Fantasy', 'Mystery', 'Thriller', 'Biography',
            'Self-Help', 'History', 'Philosophy', 'Romance', 'Technology'
        ]),
        'description' => $this->faker->text(40),
        ];
    }
}
