<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MouvementStockRequest extends FormRequest
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
            'type' => 'required|in:entree,sortie',
            'quantite' => 'required|integer',
            'produit_id' => 'required|exists:produits,id',
            'note' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Le type est requis',
            'type.in' => 'Le type doit être entree ou sortie',
            'quantite.required' => 'La quantite est requise',
            'quantite.integer' => 'La quantite doit être un entier',
            'produit_id.required' => 'Le produit est requis',
            'produit_id.exists' => 'Le produit doit exister',
            'note.string' => 'La note doit être une chaine de caracteres',
        ];
    }
}
