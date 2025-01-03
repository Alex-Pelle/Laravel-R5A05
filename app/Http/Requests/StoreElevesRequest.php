<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElevesRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date|min:0.1|before_or_equal:today',
            'numeroEtudiant' => 'required|string|max:255|unique:eleves,numeroEtudiant',
            'email' => 'required|string|max:255|unique:eleves,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
    }
}
