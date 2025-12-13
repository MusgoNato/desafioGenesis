<?php

namespace Database\Seeders;

use App\Models\Motorista;
use App\Models\Viagem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Viagem::factory()->count(20)->create()->each(function ($viagem) 
        {
            // Escolha de motoristas aleatoriamente
            $motoristas = Motorista::inRandomOrder()->take(fake()->numberBetween(1,2))->pluck('id');

            // Se não houver motoristas, cria um novo
            if($motoristas->isEmpty())
            {
                $motoristas = [Motorista::factory()->create()->id];
            }

            $viagem->motoristas()->sync($motoristas);
        });
    }
}
