<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('veiculos', function(Blueprint $table){
            $table->id();
            $table->string('modelo');
            $table->year('ano');
            $table->date('data_aquisicao');
            $table->unsignedInteger('kms_rodados');
            
            // Devem ser unicos, temporariamente adicionados
            $table->string('renavam')->unique();
            $table->string('placa')->unique();

            $table->timestamps();
        });

        /**
        * Modelo
        * Ano
        * Data de aquisição
        * KMs rodados no momento da aquisição
        * Renavam - Deve ser único
        * Placa - Deve ser único
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('veiculos');
    }
};
