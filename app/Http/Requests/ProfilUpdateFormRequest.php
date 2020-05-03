<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilUpdateFormRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'pays_id' => 'required|numeric',
            'ville' => 'required|string|min:2',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Champ obligatoire',
        ];
        
    }

}
