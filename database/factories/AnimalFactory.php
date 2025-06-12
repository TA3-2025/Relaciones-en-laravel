<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'especie' => fake()->word(),
            'raza' => fake()->word(),
            'sexo' => fake()->randomElement(['Macho', 'Hembra']),
            'color' => fake()->colorName(),
        ];
    }
}
