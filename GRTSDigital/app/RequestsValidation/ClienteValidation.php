<?php

namespace App\RequestsValidation;

use Illuminate\Support\Facades\Validator;

class ClienteValidation {

public function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


}