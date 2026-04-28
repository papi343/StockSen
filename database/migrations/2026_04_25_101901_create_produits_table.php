<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Fournisseur;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->string('nom', 50);
            $table->double('prix');
            $table->integer('quantite');
            $table->double('stock_mini');
            $table->string('description')->nullable();
            $table->foreignIdFor(Fournisseur::class)->constrained('fournisseur')->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained('category')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
