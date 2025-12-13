<?php

namespace Database\Factories;

use App\Models\Motorista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorista>
 */
class MotoristaFactory extends Factory
{
    protected $model = Motorista::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nome' => fake()->name(),
            'numero_cnh' => fake()->numerify('###########'),
            'data_nascimento' => $this->faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
        ];
    }
}
