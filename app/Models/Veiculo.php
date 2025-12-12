<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Veiculo extends Model
{
    //
    protected $fillable = [
        'modelo',
        'ano',
        'data_aquisicao',
        'kms_rodados',
        'renavam',
        'placa',
    ];

    public function viagens()
    {
        return $this->hasMany(Viagem::class);
    }
}
