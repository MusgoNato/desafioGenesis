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
        Schema::create('motorista_viagem', function (Blueprint $table) {
            $table->id();    
            $table->unsignedBigInteger('viagem_id');
            $table->unsignedBigInteger('motorista_id');

            $table->foreign('viagem_id')->references('id')->on('viagens')->onDelete('cascade');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('motorista_viagem');
    }
};
