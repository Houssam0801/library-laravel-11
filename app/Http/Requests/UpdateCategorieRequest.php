<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomcategorie' => 'required|string|max:255|unique:categories,nomcategorie',
            'description' => 'nullable|string',
        ];
    }
    public function messages():array
    {
        return [
            'nomcategorie.required' => 'Le nom de la catégorie est requis.',
            'nomcategorie.string' => 'Le nom de la catégorie doit être une chaîne de caractères.',
            'nomcategorie.max' => 'Le nom de la catégorie ne doit pas dépasser 255 caractères.',
            'nomcategorie.unique' => 'Le nom de la catégorie existe déjà.',
            'description.string' => 'La description doit être une chaîne de caractères.',
        ];
    }
   
}
