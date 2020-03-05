<?php

namespace App\RequestsValidation;

use Illuminate\Support\Facades\Validator;

class ClienteValidation {

public function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'responsavel' => ['required', 'string', 'max:50'],
            'cnpj' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'string', 'max:9'],
            'estado' => ['required', 'string', 'max:50'],
            'cidade' => ['required', 'string', 'max:50'],
            'bairro' => ['required', 'string', 'max:50'],
            'logradouro' => ['required', 'string', 'max:50'],
            'complemento' => ['required', 'string', 'max:50'],
            'numero' => ['required', 'string', 'max:50'],
        ]);
    }

}