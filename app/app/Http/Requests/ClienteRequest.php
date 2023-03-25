<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string',
            'telefone' => 'numeric',
            'email' => "email|unique:App\Cliente,email,$this->cliente",
            'ultima_compra' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'required' => "O campo :attribute e obrigatório.",
            'string' => "O campo :attribute precisa ser string.",
            'email' => "O campo :attribute precisa ser um e-mail valido.",
            'unique' => "O campo :attribute já esta registrado.",
            'numeric' => "O campo :attribute deve possuir apenas numeros.",
        ];
    }
}
