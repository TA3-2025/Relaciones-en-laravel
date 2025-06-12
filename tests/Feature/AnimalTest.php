<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AnimalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Listar(): void
    {
        $response = $this -> get('/api/animal');
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            '*' => [
                'id',
                'nombre',
                'especie',
                'raza',
                'sexo',
                'color',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function test_BuscarExistente(): void
    {
        $response = $this -> get('/api/animal/1');
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            'id',
            'nombre',
            'especie',
            'raza',
            'sexo',
            'color',
            'created_at',
            'updated_at'
        ]);
    }

    public function test_BuscarNoExistente(): void
    {
        $response = $this -> get('/api/animal/999');
        $response -> assertStatus(404);
    }

    public function test_Crear(): void
    {
        $data = [
            'nombre' => 'Luna',
            'especie' => 'Perro',
            'raza' => 'Labrador',
            'sexo' => 'Hembra',
            'color' => 'Amarillo'
        ];
        $response = $this -> post('/api/animal', $data);
        $response -> assertStatus(201);
        $response -> assertJsonStructure([
            'id',
            'nombre',
            'especie',
            'raza',
            'sexo',
            'color',
            'created_at',
            'updated_at'
        ]);
        $this->assertDatabaseHas('animales', $data);
    }

    public function test_ModificarExistente(): void
    {
        $data = [
            'nombre' => Str::Random(10),
            'especie' => Str::Random(10),
            'raza' => Str::Random(10),
            'sexo' => Str::Random(10),
            'color' => Str::Random(10)
        ];
        $response = $this -> put('/api/animal/1000', $data);
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            'id',
            'nombre',
            'especie',
            'raza',
            'sexo',
            'color',
            'created_at',
            'updated_at',
            'deleted_at'
        ]);
        $this->assertDatabaseHas('animales', $data);
    }

    public function test_ModificarNoExistente(): void
    {
        $response = $this -> put('/api/animal/999');
        $response -> assertStatus(404);
    }

    public function test_EliminarExistente(): void
    {
        $response = $this -> delete('/api/animal/1001');
        $response -> assertStatus(200);

        $response -> assertJsonFragment([
            'deleted' => true
        ]);

        $this->assertDatabaseMissing('animales', [
            'id' => 1001,
            'deleted_at' => null
        ]);
    }

    public function test_EliminarNoExistente(): void
    {
        $response = $this -> delete('/api/animal/999');
        $response -> assertStatus(404);
    }

}
