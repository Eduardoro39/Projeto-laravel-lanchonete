<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            'nome' => 'bail|regex:/^([A-Z]+\s?)+$/',
            'email' => [
                'bail',
                'required',
                'email:rfc,strict,dns,spoof,filter',
                Rule::unique('pessoas')->ignore($this->pessoa_id)
            ],
            'password' => 'bail|min:6|regex:/^[a-zA-Z0-9]+$/',
            'password' => Rule::requiredIf($this->_method != "PUT"),
            'foto' => 'bail|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }
}
