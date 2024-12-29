<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dateEval' => 'required|date|min:0.1',
            'titreEval' => 'required|string|max:255',
            'coefEval' => 'required|numeric|min:0.1',
            'moduleEval' => 'required|string|max:255',
        ];
    }
}
