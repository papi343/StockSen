<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\MouvementStock; 
use Illuminate\Database\Eloquent\Builder;


class DashBoarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProduit = Produit::count();
        $totalFournisseur = Fournisseur::count();
        $totalCategorie = Category::count();
        $alertStockFaible = Produit::where('quantite','<=','stock_mini')->get();
        $totalEntree = MouvementStock::where('type','entree')->sum('quantite');
        $totalSortie = MouvementStock::where('type','sortie')->sum('quantite');
        $dernierMouvement = MouvementStock::with('produits')
                                            ->latest()
                                            ->take(5)
                                            ->get();
        return response()->json([
            'message' => 'Dashboard',
            'data' => [
                'totalProduit' => $totalProduit,
                'alertStockFaible' => $alertStockFaible,
                'totalEntree' => $totalEntree,
                'totalSortie' => $totalSortie,
                'dernierMouvement' => $dernierMouvement,
                'totalFournisseur' => $totalFournisseur,
                'totalCategorie' => $totalCategorie,
            ],
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
