<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\MouvementStock;
use App\Models\Fournisseur;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['ref', 'nom', 'prix', 'quantite', 'stock_mini', 'description', 'fournisseur_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function mouvementStock()
    {
        return $this->hasMany(MouvementStock::class);
    }

}
