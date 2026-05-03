<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create 10 categories
        $categories = \App\Models\Category::factory(10)->create();

        // 2. Create 10 suppliers
        $fournisseur = \App\Models\Fournisseur::factory(10)->create();

        // 3. Create 50 products
        // We'll distribute them among existing categories and suppliers
        $produits = \App\Models\Produit::factory(50)->recycle($categories)->recycle($fournisseur)->create();

        // 4. Create 100 movements (entries and exits)
        \App\Models\MouvementStock::factory(100)->recycle($produits)->create();

        // 5. Create 5 managers (gestionnaire)
        \App\Models\User::factory(5)->gestionnaire()->create();

        // Optional: Create a test admin user
        \App\Models\User::factory()->create([
            'nom' => 'Admin',
            'prenom' => 'User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
        ]);
    }
}
