<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    //
    protected $fillable = [
        'nome',
        'data_nascimento',
        'numero_cnh',
    ];
}
