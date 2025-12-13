<?php

namespace Database\Factories;

use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'modelo' => fake()->word(),
            'ano' => fake()->numberBetween(2000, date('Y')),
            'data_aquisicao' => fake()->date(),
            'kms_rodados' => fake()->numberBetween(0, 99999),
            'placa' => strtoupper(fake()->unique()->bothify('???-####')),
            'renavam' => fake()->unique()->numerify('###########'),
        ];
    }   
}
