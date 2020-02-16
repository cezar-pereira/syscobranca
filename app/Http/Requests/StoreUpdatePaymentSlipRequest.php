<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePaymentSlipRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'details' => 'bail|required|max:255',
            'grossIncome' => 'required|numeric',
            'dueDate' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            "details.required" => "Uma descrição é necessária",
            "details.max" => "A quantidade de caracteres máximo é :max",
            "grossIncome.required" => "Um valor para o boleto deve ser informado",
            "grossIncome.numeric" => "O valor do boleto deve ser numerico",
            "dueDate.required" => "A data deve ser informada",
            "dueDate.date" => "A data deve ser informada",
        ];
    }
}
