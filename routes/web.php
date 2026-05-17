<?php

use App\Http\Controllers\ProfileController;
use App\Models\Horario;
use App\Models\Evento;
use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. VISTA PÚBLICA PRINCIPAL (welcome.blade.php)
Route::get('/', function () {
    $horarios = Horario::all();
    $eventos = Evento::orderBy('fecha', 'asc')->get();
    $config = Configuracion::first(); 
    
    return view('welcome', compact('horarios', 'eventos', 'config'));
});

// 2. RUTAS PÚBLICAS DE INSCRIPCIÓN (Para los feligreses desde el welcome)
Route::get('/inscritos/create', [App\Http\Controllers\InscritoController::class, 'create'])->name('inscritos.create');
Route::post('/inscritos', [App\Http\Controllers\InscritoController::class, 'store'])->name('inscritos.store');


// 3. PANEL DE ADMINISTRACIÓN PROTEGIDO (Pantalla de Bienvenida con las 3 tarjetas)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 4. GRUPO DE RUTAS BAJO AUTENTICACIÓN (Controladores del Administrador)
Route::middleware('auth')->group(function () {
    
    // ─── RUTA GET: RENDERIZA EL FORMULARIO INDEPENDIENTE (editar-web.blade.php) ───
    Route::get('/admin/editar-web', function () {
        return view('editar-web');
    })->name('admin.configuracion.edit');

    // CRUD Completos para el Administrador (Habilita index, edit, update, destroy, show)
    Route::resource('inscritos', App\Http\Controllers\InscritoController::class)->except(['create', 'store']);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('eventos', App\Http\Controllers\EventoController::class);

    // Rutas de Perfil Nativas de Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ─── PROCESAMIENTO DEL FORMULARIO POST (Guarda los cambios de la web) ───
    Route::post('/admin/configuracion', function (Request $request) {
        $data = $request->validate([
            'titulo'          => 'required|string|max:255',
            'descripcion'     => 'required|string',
            'lugar'           => 'required|string|max:255',
            'ubicacion_mapa'  => 'nullable|string',
            'imagen'          => 'nullable|image|max:2048',
        ]);

        $config = Configuracion::first();
        if (!$config) { 
            $config = new Configuracion(); 
        }

        // Manejo seguro de la fotografía de portada
        if ($request->hasFile('imagen')) {
            if ($config->imagen) { 
                Storage::disk('public')->delete($config->imagen); 
            }
            $data['imagen'] = $request->file('imagen')->store('parroquia', 'public');
        }

        // Asignación directa de campos para saltar restricciones de MassAssignment
        $config->titulo = $data['titulo'];
        $config->descripcion = $data['descripcion'];
        $config->lugar = $data['lugar'];
        $config->ubicacion_mapa = $data['ubicacion_mapa'] ?? $config->ubicacion_mapa;
        if (isset($data['imagen'])) { 
            $config->imagen = $data['imagen']; 
        }
        
        $config->save();

        return redirect()->back()->with('success', 'La información de la parroquia ha sido actualizada correctamente.');
    })->name('admin.configuracion.update');

});

require __DIR__.'/auth.php';