<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    // Mostrar el listado de horarios al administrador
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    // Mostrar el formulario para crear un nuevo horario
    public function create()
    {
        return view('horarios.create');
    }

    // Guardar el nuevo horario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|string|max:255',
            'hora' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario parroquial creado correctamente.');
    }

    // Mostrar el formulario para editar
    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact('horario'));
    }

    // Actualizar el horario en la base de datos
    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'dia' => 'required|string|max:255',
            'hora' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    // Eliminar un horario
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}