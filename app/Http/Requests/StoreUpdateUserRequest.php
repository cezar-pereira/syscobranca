<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'between:2,255'],
            'cpf' => ['bail', 'required', 'digits:11', Rule::unique('users')->ignore($this->user)],
            'phone' => ['bail', 'required', 'digits:11', Rule::unique('users')->ignore($this->user)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'name.between' => 'Nome deve ter mais de 2 caracteres.',

            'cpf.required' => 'CPF é obrigatório.',
            'cpf.digits' => 'CPF deve ter 11 caracteres.',
            'cpf.unique' => 'CPF já cadastrado.',

            'phone.required' => 'Contato é obrigatório.',
            'phone.digits' => 'Contato deve ter 11 caracteres.',
            'phone.unique' => 'Contato já cadastrado.',
        ];
    }
}
