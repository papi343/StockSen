<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ref' => 'required|string|unique:produits,ref',
            'nom' => 'required|string|max:50',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'stock_mini' => 'required|numeric',
            'description' => 'nullable|string',
            'fournisseur_id' => 'required|exists:fournisseur,id',
            'category_id' => 'required|exists:category,id'
        ];
    }
    public function messages()
    {
        return [
            'ref.required' => 'Veuillez fournir une reference svp.',
            'ref.unique' => 'Cette reference existe deja.',
            'nom.required' => 'Veuillez fournir un nom svp.',
            'nom.string' => 'Le nom doit etre une chaine de caracteres.',
            'prix.required' => 'Veuillez fournir un prix svp.',
            'prix.numeric' => 'Le prix doit etre un nombre.',
            'quantite.required' => 'Veuillez fournir une quantite svp.',
            'quantite.integer' => 'La quantite doit etre un nombre entier.',
            'stock_mini.required' => 'Veuillez fournir un stock minimum svp.',
            'stock_mini.numeric' => 'Le stock minimum doit etre un nombre.',
            'description.string' => 'La description doit etre une chaine de caracteres.',
            'fournisseur_id.required' => 'Veuillez fournir un fournisseur svp.',
            'fournisseur_id.exists' => 'Le fournisseur selectionne n\'existe pas.',
            'category_id.required' => 'Veuillez fournir une categorie svp.',
            'category_id.exists' => 'La categorie selectionne n\'existe pas.'
        ];
    }
}
