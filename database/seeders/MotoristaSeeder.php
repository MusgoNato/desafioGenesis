<?php

namespace Database\Seeders;

use App\Models\Motorista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotoristaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Motorista::factory()->count(20)->create();
    }
}
