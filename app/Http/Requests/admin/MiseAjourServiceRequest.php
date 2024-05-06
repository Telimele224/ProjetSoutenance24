<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class MiseAjourServiceRequest extends FormRequest
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
            'photo' => ['image','mimes:jpeg,jpg,png,gif,svg'],
            'nom' => ['required', 'string', 'min:5',],
            'description' => ['required','string','min:3'],
            'avatar' => ['image','mimes:jpeg,jpg,png,gif,svg'],
            'symptoms' => ['nullable'],
            'illnesses' => ['nullable'],
            'diseases' => ['nullable'],
        ];
    }
}
