<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return response()->json([
            'message' => 'succes',
            'data' => $produits
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = Produit::create($request->validated());
        return response()->json([
            'message' => 'Produit ajouter avec succes',
            'date' => $produit
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return response()->json([
            'message' => 'Produit trouver avec succes',
            'date' => $produit
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->update($request->validated());
        return response()->json([
            'message' => 'Produit mise a jour avec succes',
            'date' => $produit
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return response()->json([
            'message' => ' Produit supprime avec succes'
        ],200);
    }
}
