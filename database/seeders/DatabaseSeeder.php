<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Veiculo;
use App\Models\Viagem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MotoristaSeeder::class,
            VeiculoSeeder::class,
            ViagemSeeder::class,
        ]);
    }
}
