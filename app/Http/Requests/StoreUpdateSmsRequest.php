<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSmsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => 'bail|required|max:160',
        ];
    }

    public function messages()
    {
        return[
            'message.required' => 'Mensagem é requerida',
            'message.max' => 'Quantidade de caracteres máximo para mensagem é :max.',
        ];
    }
}
