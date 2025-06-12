<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\Animal::factory(30)->create();

        \App\Models\Animal::factory(1)->create([
            'id' => 1000,
            'nombre' => 'Luna',
            'especie' => 'Pez',
            'raza' => 'Betta',
            'sexo' => 'Macho',
            'color' => 'Dorado'
        ]);

        \App\Models\Animal::factory(1)->create(['id' => 1001]);
    }
}
