<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetFormRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
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
