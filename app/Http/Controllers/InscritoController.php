<?php

namespace App\Http\Controllers;

use App\Models\Inscrito;
use App\Models\Sacramento;
use Illuminate\Http\Request;

class InscritoController extends Controller
{
    /**
     * Requisito #4: Mostrar el listado (READ)
     */
    public function index()
    {
        // Requisito #3: Uso de Eloquent con relaciones (Eager Loading)
        $inscritos = Inscrito::with('sacramento')->get();
        return view('inscritos.index', compact('inscritos'));
    }

    /**
     * Requisito #4: Mostrar formulario de registro (CREATE)
     */
    public function create()
    {
        $sacramentos = Sacramento::all(); // Obtenemos los sacramentos para el select
        return view('inscritos.create', compact('sacramentos'));
    }

    /**
     * Requisito #4: Guardar en la base de datos (STORE)
     */
    public function store(Request $request)
    {
        // Requisito #5: Validación de datos
        $request->validate([
            'nombre_joven' => 'required|string|max:100',
            'nombre_responsable' => 'required|string|max:100',
            'dui' => 'required|unique:inscritos,dui',
            'telefono' => 'required',
            'edad' => 'required|integer',
            'sacramento_id' => 'required|exists:sacramentos,id',
        ]);

        // Requisito #3: Persistencia de datos usando Eloquent
        Inscrito::create($request->all());

        return redirect()->route('inscritos.index')->with('success', '¡Registro exitoso!');
    }

    /**
     * Requisito #4: Mostrar formulario de edición (EDIT)
     */
    public function edit($id)
    {
        $inscrito = Inscrito::findOrFail($id);
        $sacramentos = Sacramento::all();
        return view('inscritos.edit', compact('inscrito', 'sacramentos'));
    }

    /**
     * Requisito #4: Actualizar registro (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $inscrito = Inscrito::findOrFail($id);
        
        $request->validate([
            'nombre_joven' => 'required',
            'dui' => 'required|unique:inscritos,dui,' . $id,
            'sacramento_id' => 'required',
        ]);

        $inscrito->update($request->all());

        return redirect()->route('inscritos.index')->with('success', 'Registro actualizado');
    }

    /**
     * Requisito #4: Eliminar registro (DELETE)
     */
    public function destroy($id)
    {
        $inscrito = Inscrito::findOrFail($id);
        $inscrito->delete();

        return redirect()->route('inscritos.index')->with('success', 'Registro eliminado correctamente');
    }
}