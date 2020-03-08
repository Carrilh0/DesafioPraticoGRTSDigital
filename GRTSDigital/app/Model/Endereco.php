<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'complemento',
        'numero',
        'cidade',
        'estado',
        'principal',
        'cliente_id'
    ];

}
