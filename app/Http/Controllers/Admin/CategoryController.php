<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'data' => $categories
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
         $categorie = Category::create($request->validated());

        return response()->json([
            'message' => 'Category cree avec succes ',
            'data'=>$categorie
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Category::find($id);
        return response()->json([
            'message'=> 'Category trouver avec succes',
            'data' => $categorie

        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Category::find($id);
        $categorie->update($request->validated());
        return response()->json([
            'message' => 'Category mise a jour avec succes',
            'data' => $categorie
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Category::find($id);
        $categorie->delete();
        return response()->json([
            'message' => 'Category supprimer avec succes'
        ],200);
    }
}
