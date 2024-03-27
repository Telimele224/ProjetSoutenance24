<?php

namespace App\Http\Requests\medecin;

use Illuminate\Foundation\Http\FormRequest;

class OrdonnanceRequest extends FormRequest
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
            'consultation_id'=>['required','exists:consultations,id'],
            'name'=>['required','string'],
            'posologie'=>['required','string'],
            'mode_utilisation'=>['required','string'],

        ];
    }
}
