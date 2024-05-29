<?php

namespace App\Http\Requests\medecin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsultationRequest extends FormRequest
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
        $id = $this->route('consultation');
        return [
            'rdv_id'=>['required','exists:rdvs,id'],
            'type_consultation_id' => ['required','exists:type_consultations,id'],
            'motif'=>['required','string'],
            'resultat'=>['required','string'],
            'examen_complementaire'=>['required','string'],
            'suivi_recommande'=>['required','string'],
            'note_medecin'=>['required','string'],
            'status'=>['required','string'],
        ];

    }
}
