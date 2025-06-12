<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function ListarTodos(Request $request){
        $animales = Animal::all();
        return $animales;
    }

    public function Buscar(Request $request, $id){
        $animal = Animal::findOrFail($id);
        return $animal;
    }

    public function Crear(Request $request){
        $animal = new Animal();
        $animal->nombre = $request->post('nombre');
        $animal->especie = $request->post('especie');
        $animal->raza = $request->post('raza');
        $animal->sexo = $request->post('sexo');
        $animal->color = $request->post('color');
        $animal->save();

        return $animal;
    }

    public function Eliminar(Request $request, $id){
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return response()->json(['deleted' => true]);
    }

    public function Modificar(Request $request, $id){
        $animal = Animal::findOrFail($id);
        $animal->nombre = $request->post('nombre');
        $animal->especie = $request->post('especie');
        $animal->raza = $request->post('raza');
        $animal->sexo = $request->post('sexo');
        $animal->color = $request->post('color');
        $animal->save();

        return $animal;
    }
}
