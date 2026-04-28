<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Fournisseur;

class FournisseurRequest extends FormRequest
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
            'nom' => 'required |string|max:50',
            'prenom' => 'required |string|max:50',
            'email' => 'required |email|unique:fournisseur,email',
            'tel' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'adresse'=>'nullable | string'

        ];
    }
    public function messages():array
    {
        return[
            'nom.required' => 'veuillez remplire le nom svp',
            'nom.string' => 'le nom doit etre une chaine de caractere',
            'prenom.required' => 'veuillez remplire le prenom svp',
            'prenom.string' =>  'le prenom doit etre une chaine de caractere',
            'tel.required' => 'veuillez remplire le telephone svp',
            'tel.string' => 'le telephone doit etre une chaine de caractere'
        ];
    }
}
