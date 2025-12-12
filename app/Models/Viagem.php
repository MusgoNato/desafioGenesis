<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnArgument;

class Viagem extends Model
{
    //
    protected $table = 'viagens';

    protected $fillable = [
        'nome_viagem',
        'motorista_id',
        'veiculo_id',
        'km_inicial',
        'km_final',
        'inicio_viagem',
        'fim_viagem',
    ];

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'motorista_viagem');
    }

    public function veiculo()
    {   
        return $this->belongsTo(Veiculo::class);
    }
}
