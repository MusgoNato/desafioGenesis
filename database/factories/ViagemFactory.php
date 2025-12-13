<?php

namespace Database\Factories;

use App\Models\Veiculo;
use App\Models\Viagem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Viagem>
 */
class ViagemFactory extends Factory
{
    protected $model = Viagem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inicio = fake()->dateTimeBetween('-1 year', 'now');
        $kmInicial = fake()->numberBetween(0, 99999);

        $fim = fake()->boolean(70) ? fake()->dateTimeBetween($inicio, 'now') : null;
        $kmFinal = $fim ? $kmInicial + fake()->numberBetween(10, 1000) : null;

        return [
            'nome_viagem' => fake()->sentence(3),

            // Garante que a viagem contenha pelo menos um veiculo, caso contrario cria um
            'veiculo_id' => Veiculo::factory(),
            'km_inicial' => $kmInicial,
            'km_final' => $kmFinal,
            'inicio_viagem' => $inicio->format('Y-m-d\TH:i'),
            'fim_viagem' => $fim ? $fim->format('Y-m-d\TH:i') : null,
        ];
    }
}
