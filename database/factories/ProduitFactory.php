<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref' => fake()->unique()->bothify('PRD-####'),
            'nom' => fake()->words(2, true),
            'prix' => fake()->randomFloat(2, 10, 1000),
            'quantite' => fake()->numberBetween(0, 500),
            'stock_mini' => fake()->numberBetween(5, 50),
            'description' => fake()->sentence(),
            'fournisseur_id' => Fournisseur::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
