<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
        //dd(request()->get('cpf'));
        
        return [
            'name' => 'required',       
            'email'      => [
                'required',
                Rule::unique('users')->ignore(request()->get('id'))
            ],
            'username'      => [
                'required',
                'min:4',
                Rule::unique('users')->ignore(request()->get('id'))
            ],
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        /**
         * :validação => Return Numero Validação
         * :attribute => Return Nome do Campo
         */
        return [
            'required' => 'Campo requerido',
            'min'      => 'Campo deve ter no mínimo :min caracteres',
            'unique'   => 'Já existe este :attribute',
        ];

    }
}
