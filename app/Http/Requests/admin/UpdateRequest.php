<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class updateRequest extends FormRequest
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
            'name' => 'string',
            'nom' => '|string',
            'prenom' => '|string',
            'genre' => '|string',
            'adresse' => '|string',
            'age' => 'integer',
            'telephone' => 'string|min:9|max:15|unique:users,telephone',
            'photo' => 'nullable|image',
            'email' => 'email|unique:users,email',
            'password' => ['','min:8', 'confirmed', Rules\Password::defaults()],
            // 'poids' => '|integer',
            'ville' => 'string',
            
        ];
    }
}
