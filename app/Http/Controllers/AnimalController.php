<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Validator;


class AnimalController extends Controller
{
    public function ListarTodos(Request $request){
        $animales = Animal::with("habitat")->
                            with("come") ->
                            get();
        return $animales;
    }

    public function Buscar(Request $request, $id){
        $animal = Animal::with("habitat") -> findOrFail($id);
        return $animal;
    }

    private function ValidarRequest($datos){
         $validation = Validator::make($datos,[
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'sexo' => 'required|in:M,H',
            'color' => 'required',
            'habitat_id' => 'required|exists:habitats,id'
        ]);

        return $validation->fails() ? $validation->errors() : null;

    }
    public function Crear(Request $request){

        if(($validacion = $this -> ValidarRequest($request->all()) ) != null)
            return response($validacion, 401);

        $animal = new Animal();
        $animal->nombre = $request->post('nombre');
        $animal->especie = $request->post('especie');
        $animal->raza = $request->post('raza');
        $animal->sexo = $request->post('sexo');
        $animal->color = $request->post('color');
        $animal->habitat_id = $request->post('habitat_id');
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
        
        if(($validacion = $this -> ValidarRequest($request->all()) ) != null)
            return response($validacion, 401);

        $animal->nombre = $request->post('nombre');
        $animal->especie = $request->post('especie');
        $animal->raza = $request->post('raza');
        $animal->sexo = $request->post('sexo');
        $animal->color = $request->post('color');
        $animal->habitat_id = $request->post('habitat_id');

        $animal->save();

        return $animal;
    }
}
