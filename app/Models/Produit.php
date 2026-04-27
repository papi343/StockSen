<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Produit extends Model
{

    protected $fillable = ['ref', 'nom', 'prix', 'quantite', 'stock_mini', 'description', 'fournisseur_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }


}
