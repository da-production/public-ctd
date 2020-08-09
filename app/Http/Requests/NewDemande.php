<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewDemande extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'identifiant'   => 'required|string|max:6',
            'nom'           => 'required|string|min:3|max:50',
            'prenom'        => 'required|string|min:3|max:50',
            'naissance'     => 'required',
            'father'        => 'required|string|min:3|max:50',
            'mother'        => 'required|string|min:3|max:50',
            'code_commune'  => 'required|string|max:4',
        ];
    }

    public function messages()
    {
        return [
            'identifiant.required' => 'Le champ identifiant est obligatoire.',
            'nom.required' => 'Le champ nom est obligatoire.',
            'prenom.required' => 'Le champ prenom est obligatoire.',
            'naissance.required' => 'Le champ naissance est obligatoire.',
            'father.required' => 'Le champ Nom de pére est obligatoire.',
            'mother.required' => 'Le champ Nom et Prénom de mère est obligatoire.',
            'code_commune.required' => 'Le champ Commune est obligatoire.',
        ];
    }
}
