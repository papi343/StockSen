<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseur = Fournisseur::all();
        return response()->json([
            'message'=>'succes',
            'date'=>$fournisseur
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fournisseur = Fournisseur::create($request->validated());
        return response()->json([
            'message'=>'Fournisseur cree avec success',
            'date'=> $fournisseur
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fournisseur = Fournisseur::find($id);
        return response()->json([
            'message'=>'Fournisseur trouver avec succes',
            'data' => $fournisseur
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->update($request->validated());
        return response()->json([
            'message' => 'Fournisseur mise a jour avec succes',
            'date' => $fournisseur
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->delete();
        return response()->json([
            'message'=>'Fournisseur supprimer avec succes'
        ],200);
    }
}
