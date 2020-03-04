<?php

namespace App\RequestsValidation;

use Illuminate\Support\Facades\Validator;

class UsuarioValidation {

    public function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


    

    public function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$data['id']],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


}

