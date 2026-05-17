<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $config->titulo ?? 'Parroquia de la Comunidad' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100 text-gray-800 font-sans" style="background-color: #f3f4f6;">

        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
                <div>
                    <span class="text-xl font-extrabold text-amber-600 tracking-tight">⛪ Parroquia <span class="text-indigo-900 font-bold"></span></span>
                </div>
                <nav class="flex items-center space-x-6" style="display: flex; gap: 1.5rem; align-items: center;">
                    <a href="#eventos-detallados" class="text-sm font-bold text-gray-600 hover:text-indigo-600 transition">Eventos</a>
                    <a href="/login" class="text-sm font-bold text-gray-500 hover:text-indigo-600 transition">Ingresar</a>
                </nav>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            
            <div style="display: flex; flex-wrap: wrap; gap: 2rem; text-align: left;">
                
                <div style="flex: 2; min-w: 320px; display: flex; flex-direction: column; gap: 3rem;">
                    
                    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-200" style="background-color: white; text-align: left; width: 100%;">
                        <div class="space-y-3">
                            <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold uppercase tracking-wider rounded">Sede Parroquial</span>
                            
                            <h1 class="text-3xl sm:text-4xl font-black text-gray-900 tracking-tight" style="font-weight: 900; color: #111827;">
                                {{ $config->titulo ?? 'Caminando juntos en la Fe y el Servicio' }}
                            </h1>
                            
                            <p class="text-sm font-bold text-amber-600" style="color: #d97706;">
                                🏢 Lugar: {{ $config->lugar ?? '' }}
                            </p>
                            
                            <p class="text-gray-600 text-sm leading-relaxed pt-2">
                                {{ $config->descripcion ?? 'Le damos la más cálida bienvenida a nuestra plataforma. Un espacio comunitario desarrollado para que la feligresía consulte las eucaristías de la semana, visualice los anuncios importantes y acceda al proceso de formación de los sacramentos.' }}
                            </p>
                        </div>

                        <div class="my-6 w-full rounded-xl overflow-hidden shadow border border-gray-200" style="height: 320px; overflow: hidden;">
                            @if($config && $config->imagen)
                                <img src="{{ asset('storage/' . $config->imagen) }}" alt="Fotografía Parroquia" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="https://images.unsplash.com/photo-1548625361-155deee223cb?auto=format&fit=crop&w=1200&q=80" alt="Fotografía Parroquia" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </div>

                        <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4" style="background-color: #f9fafb; display: flex; justify-content: space-between; align-items: center;">
                            <div class="text-left">
                                <h4 class="font-bold text-gray-800 text-sm" style="color: #1f2937;">¿Deseas inscribir a un joven a los Sacramentos?</h4>
                                <p class="text-xs text-gray-500" style="color: #6b7280;">Formulario público disponible para Comunión, Confirmación y Bautizo.</p>
                            </div>
                            <a href="/inscritos/create" class="w-full sm:w-auto px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold uppercase tracking-wide rounded-lg text-center shadow" style="background-color: #4f46e5; color: white;">
                                ✍️ Inscribirse Aquí
                            </a>
                        </div>
                    </div>

                    <div id="eventos-detallados" style="text-align: left; width: 100%;">
                        <div class="mb-6 border-b border-gray-200 pb-3">
                            <h2 class="text-2xl font-black text-gray-900 tracking-tight" style="font-weight: 900;">Próximos Eventos y Actividades en Detalle</h2>
                            <p class="text-xs text-gray-500 mt-1">Cronograma oficial de actividades comunitarias de la iglesia.</p>
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 2rem;">
                            @forelse($eventos as $evento)
                                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden" style="background-color: white; display: flex; flex-direction: column;">
                                    
                                    <div class="w-full h-64 bg-gray-100 relative" style="position: relative; height: 16rem; overflow: hidden; border-b: 1px solid #e5e7eb;">
                                        @if($evento->imagen)
                                            <img src="{{ asset('storage/' . $evento->imagen) }}" alt="Afiche" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-50" style="background-color: #f9fafb; display: flex; align-items: center; justify-content: center;">
                                                <span class="text-sm font-bold uppercase" style="color: #9ca3af;">📋 Fotografía de la Actividad</span>
                                            </div>
                                        @endif
                                        <div class="absolute top-4 left-4 bg-white/95 px-3 py-1.5 rounded-lg shadow text-xs font-bold text-indigo-900" style="position: absolute; top: 1rem; left: 1rem; background-color: rgba(255,255,255,0.95); padding: 0.35rem 0.85rem; font-weight: 700; color: #1e1b4b; z-index: 10;">
                                            📅 {{ date('d/m/Y', strtotime($evento->fecha)) }}
                                        </div>
                                    </div>

                                    <div class="p-6 space-y-4" style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1rem; background-color: white;">
                                        <div class="space-y-2">
                                            <h3 class="font-black text-gray-900 text-xl leading-tight" style="font-weight: 900; color: #111827;">
                                                {{ $evento->titulo }}
                                            </h3>
                                            <p class="text-sm text-gray-600 leading-relaxed" style="color: #4b5563;">
                                                {{ $evento->descripcion }}
                                            </p>
                                        </div>
                                        
                                        <div class="text-xs font-bold text-indigo-700 bg-indigo-50 p-3 rounded-xl border border-indigo-100" style="background-color: #e0e7ff; color: #4338ca; padding: 0.75rem; border-radius: 0.5rem; margin-top: 0.5rem;">
                                            📍 Ubicación interna del Acto: <span class="text-gray-700 font-medium" style="color: #374151; font-weight: 500;">{{ $evento->lugar }}</span>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="p-10 text-center text-gray-400 italic bg-white rounded-xl border border-dashed border-gray-200" style="text-align: center; color: #9ca3af; border: 2px dashed #e5e7eb; padding: 2.5rem; background-color: white;">
                                    No hay eventos especiales programados por el momento.
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

                <div style="flex: 1; min-w: 280px; max-w: 380px; display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200" style="background-color: white; text-align: left;">
                        <h2 class="text-lg font-black text-gray-900 border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                            <span>🗓️</span> Horarios de Misa
                        </h2>
                        <div class="space-y-4">
                            @forelse($horarios as $horario)
                                <div class="border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                                    <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-[10px] font-bold rounded uppercase tracking-wider">{{ $horario->dia }}</span>
                                    <div class="text-xl font-black text-indigo-900 mt-1">{{ $horario->hora }}</div>
                                    <div class="text-xs text-gray-500 italic mt-0.5">{{ $horario->descripcion }}</div>
                                </div>
                            @empty
                                <p class="text-xs text-gray-400 italic">No hay horarios registrados en el sistema actualmente.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl shadow-sm border border-indigo-900" style="background-color: #1e1b4b; color: white; text-align: left;">
                        <h2 class="text-lg font-bold flex items-center gap-2 mb-2" style="color: white;">
                            <span>📍</span> Nuestra Ubicación
                        </h2>
                        <p class="text-sm leading-relaxed font-medium" style="color: #c7d2fe;">
                            Soyapango, El Salvador.
                        </p>
                        <div class="pt-5">
                            <a href="{{ $config->ubicacion_mapa ?? 'https://maps.google.com' }}" target="_blank" class="block w-full text-center px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider rounded-lg shadow transition" style="background-color: #f59e0b; color: white;">
                                🗺️ Abrir Google Maps
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <footer class="bg-gray-900 text-gray-500 py-6 text-center text-xs border-t border-gray-800" style="background-color: #111827; color: #6b7280; padding: 1.5rem 0; text-align: center; margin-top: 4rem;">
            <p>© {{ date('Y') }} Gestión Parroquial. Soyapango, El Salvador.</p>
        </footer>

    </body>
</html>