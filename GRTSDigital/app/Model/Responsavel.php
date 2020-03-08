<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone'
    ];
}
