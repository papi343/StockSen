<?php

namespace Database\Factories;

use App\Models\MouvementStock;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MouvementStock>
 */
class MouvementStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['entree', 'sortie']),
            'quantite' => fake()->numberBetween(1, 100),
            'produit_id' => Produit::factory(),
            'note' => fake()->optional()->sentence(),
        ];
    }
}
