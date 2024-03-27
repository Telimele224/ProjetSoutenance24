<?php

namespace App\Http\Requests\admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class MedecinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'genre' => 'required|string',
            'adresse' => 'required|string',
            'age' => 'required|integer',
            'telephone' => 'required|string|min:9|max:15|unique:users,telephone',
            'photo' => 'nullable|image',
            'email' => 'required|email|unique:users,email',
            'password' =>['required','min:8', 'confirmed', Rules\Password::defaults()],
            'statut' => 'required|string',
            'specialite' => 'required|string',
            'biographie' => 'string',
            'service_id' => 'required',
        ];
    }
}
