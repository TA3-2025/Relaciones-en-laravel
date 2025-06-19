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
        \App\Models\Habitat::factory(1)->create([
            'nombre' => 'Acuario',
        ]);

        \App\Models\Habitat::factory(1)->create([
            'nombre' => 'Terrario',
        ]);

        \App\Models\Habitat::factory(1)->create([
            'nombre' => 'Aerio',
        ]);


        \App\Models\Animal::factory(30)->create();
        \App\Models\Animal::factory(1)->create([
            'nombre' => 'Luna',
            'especie' => 'Pez',
            'raza' => 'Betta',
            'sexo' => 'Macho',
            'color' => 'Dorado'
        ]);


        \App\Models\Fruta::factory(10)->create();
        for($i = 1; $i <= 10; $i++) {
            \App\Models\Come::factory(1)->create([
                'animal_id' => $i + 5,
                'fruta_id' => $i
            ]);
        }
    }
}
