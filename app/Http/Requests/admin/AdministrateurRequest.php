<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;


class AdministrateurRequest extends FormRequest
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
            'age' => 'required|min:12|integer',
            'telephone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Supprimer tous les caractères non numériques du numéro de téléphone
                    $phoneNumber = preg_replace('/[^0-9]/', '', $value);

                    // Vérifier si le numéro de téléphone a au moins 8 chiffres
                    if (strlen($phoneNumber) < 8) {
                        $fail('Le numéro de téléphone doit contenir au moins 8 chiffres.');
                    }
                }
            ],

            'photo' => 'nullable|image',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                function ($attribute, $value, $fail) {
                    // Vérifier si l'e-mail contient des majuscules
                    if (strtolower($value) !== $value) {
                        $fail('L\'adresse e-mail doit être en minuscules.');
                    }
                },
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]+$/',
                Rules\Password::defaults(),
            ],
        ];
    }
}
