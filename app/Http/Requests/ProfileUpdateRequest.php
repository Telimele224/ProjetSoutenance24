<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Medecins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'nom' => [ 'string', 'max:255'],
            'age' => [ 'string', 'max:255'],
            'prenom' => [ 'string', 'max:255'],
            'specialite' => [ 'string', 'max:255'],
            'genre' => [ 'string', 'max:255'],
            'adresse' => [ 'string', 'max:255'],
            'telephone' => 'required|int|min:9|unique:users,telephone',
            'avatar'=>['image','mimes:png,jpg,jpeg,gif'],
            'biographie'=> [ 'string'],
        ];
    }
}
