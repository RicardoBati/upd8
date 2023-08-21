<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf'  => fake()->randomNumber(8),
            'nome' => fake()->name(),
            'data_nascimento' => fake()->date('Y/m/d','now'),
            'sexo' => fake()->randomElement(['M','F']),
            'endereco' => fake()->address(),
            'estado' => fake()->state(),
            'cidade'  => fake()->city(),
        ];
    }
}
