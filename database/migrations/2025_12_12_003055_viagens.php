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
        Schema::create('viagens', function(Blueprint $table){
            $table->id();
            $table->string('nome_viagem');
            $table->foreignId('veiculo_id')->constrained()->onDelete('cascade');
            $table->integer('km_inicial');
            $table->integer('km_final')->nullable();
            $table->dateTime('inicio_viagem');
            $table->dateTime('fim_viagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('viagens');
    }
};
