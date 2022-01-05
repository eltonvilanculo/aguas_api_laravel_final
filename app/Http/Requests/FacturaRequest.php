<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
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
            "montante"=>'required',
            "cliente_id"=>"required",
            "leitura_id"=>"required|exists:fin_leitura,leitura_id",
            "data_pagamento"=>"required",
            "designacao"=>"required|string"
        ];
    }
}
