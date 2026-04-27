<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class CategoryRequest extends FormRequest
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
            'nom' => 'required |string| max:50| unique:category,nom',
            'description' => 'nullable|string| max:255'
        ];
    }

    public function messages():array
    {
        return [
            'nom.required' => 'Le nom est requis',
            'nom.string' => 'Le nom doit etre une chaine de caracteres',
            'nom.max' => 'Le nom doit contenir au plus 50 caracteres',
            'nom.unique' => 'Le nom doit etre unique',
            'description.string' => 'La description doit etre une chaine de caracteres',
            'description.max' => 'La description doit contenir au plus 255 caracteres'
        ];
    }
}
