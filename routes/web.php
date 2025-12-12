<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

// Pagina centralizada para escolha dos CRUDS
Route::get('/', function () {
    return view('home');
});

// Rotas dos veiculos
Route::resource('veiculos', VeiculoController::class);

// Rotas dos motoristas
Route::resource('motoristas', MotoristaController::class);