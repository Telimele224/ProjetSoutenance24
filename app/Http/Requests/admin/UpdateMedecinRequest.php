<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedecinRequest extends FormRequest
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
            'nom'=>['required','string'],
            'prenom'=>['required','string'],
            'specialite'=>['required','string'],
            'genre'=>['required','string'],
            'adresse'=>['required','string'],
            'avatar'=>['image','mimes:png,jpg,jpeg,gif'],
            'biographie'=>['required','string'],
            'service_id'=>['exists:services,id'],
            'user_id'=>['exists:users,id'],
        ];
    }
}
