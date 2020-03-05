<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'responsavel_id'
    ];

    public function responsavel()
    {
        return $this->belongsTo('App\Models\Responsavel');
    }
}
