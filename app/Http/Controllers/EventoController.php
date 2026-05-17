<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        // Lógica para subir la imagen al disco público
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('eventos', 'public');
            $data['imagen'] = $path;
        }

        Evento::create($data);

        return redirect()->route('eventos.index')->with('success', 'Evento comunitario publicado con éxito.');
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existía para no llenar el disco de basura
            if ($evento->imagen) {
                Storage::disk('public')->delete($evento->imagen);
            }
            $path = $request->file('imagen')->store('eventos', 'public');
            $data['imagen'] = $path;
        }

        $evento->update($data);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy(Evento $evento)
    {
        if ($evento->imagen) {
            Storage::disk('public')->delete($evento->imagen);
        }
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento eliminado correctamente.');
    }
}