<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class MouvementStock extends Model
{

    protected $table = 'mouvement_stock';
    protected $fillable = [
        'type',
        'quantite',
        'produit_id',
        'note',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
