<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MouvementStockRequest;
use App\Models\MouvementStock;

class MouvementStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mouvementStocks = MouvementStock::all();
        return response()->json([
            'message' => 'MouvementStocks list',
            'data' => $mouvementStocks,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MouvementStockRequest $request)
    {
        //$mouvementStock = MouvementStock::create($request->validated());
        $produit = Produit::find($request->produit_id);
//verifier ai c'est un entree
        if ($request->type == 'sortie'&& $request->quantite > $produit->quantite) {
             return response()->json([
                    'message' => 'Stock insuffisant',
                    'stock disponible' => $produit->quantite,
                ],422);
        } 
        
        if ($request->type == 'entree') {
            $produit->quantite += $request->quantite;
        }else{
             $produit->quantite -= $request->quantite;
        }
           $produit->save();

        $mouvementStock = MouvementStock::create([
            'type' => $request->type,
            'quantite' => $request->quantite,
            'produit_id' => $request->produit_id,
            'note' => $request->note,
        ]);
        
        $alerte = $produit->quantite <= $produit->stock_mini
             return response()->json([
                     'message' => 'Enregistrement effectuer avec succes',
                     'mouvementStock' => $mouvementStock,
                     'nouveau stock' => $produit->quantite,
                     'alerte' => $alerte
                ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MouvementStock $mouvementStock)
    {
        return response()->json([
            'message' => 'Details du mouvement',
            'data' => $mouvementStock,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MouvementStock $mouvementStock)
    {
        $mouvementStock->update($request->validated());
        return response()->json([
            'message' => 'Modification effectuer avec succes',
            'data' => $mouvementStock,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MouvementStock $mouvementStock)
    {
        $mouvementStock->delete();
        return response()->json([
            'message' => 'Suppression effectuer avec succes',
        ],200);
    }
}
