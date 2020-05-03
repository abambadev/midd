<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminFormRequest extends FormRequest
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
            'nom' => 'required|string|min:2',
            'prenom' => 'required|string|min:2',
            'pays_id' => 'required|numeric',
            'ville' => 'required|string|min:2',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Le champ est obligatoire.',
            'confirmed' => "Le champ de confirmation ne correspond pas.",
            'min' => "Veuillez saisir au moins :min caractères."
        ];
    }
}
