<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class PatientRequest extends FormRequest
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
            'name' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'genre' => 'required|string',
            'adresse' => 'required|string',
            'age' => 'required|integer',
            'telephone' => 'required|string|min:9|max:15|unique:users,telephone',
            'avatar' => 'nullable|image',
            'email' => 'required|email|unique:users,email',
            'password' => ['required','min:8', 'confirmed', Rules\Password::defaults()],
            // 'poids' => 'required|integer',
            'ville' => 'required|string',
        ];
    }
}
