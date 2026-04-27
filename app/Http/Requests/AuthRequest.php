<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required |min:8',
            'role'=>'required |in:admin,gestionnaire,fournisseur',
            'nom'=>'required',
            'prenom'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Le champ email doit être une adresse email valide.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le champ mot de passe doit contenir au moins 8 caractères.',
            'role.required' => 'Le champ rôle est requis.',
            'role.in' => 'Le champ rôle doit être admin, gestionnaire ou fournisseur.',
            'nom.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prenom est requis.',
        ];
    }
}
