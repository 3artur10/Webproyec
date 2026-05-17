<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestionar Página Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if (session('success'))
                <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm font-medium">
                    ✨ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-200">
                <div class="p-6 sm:p-8 text-gray-900">
                    
                    <div class="border-b border-gray-100 pb-4 mb-6 text-left">
                        <h3 class="text-xl font-black text-gray-900 tracking-tight">⚙️ Configuración</h3>
                        <p class="text-xs text-gray-500 mt-1">Modifique los datos de abajo. Lo que no toque se mantendrá igual.</p>
                    </div>

                    <form method="POST" action="{{ route('admin.configuracion.update') }}" enctype="multipart/form-data" class="space-y-6 text-left">
                        @csrf
                        
                        @php
                            $currentConfig = \App\Models\Configuracion::first();
                        @endphp

                        <div>
                            <x-input-label for="titulo" value="Título de Bienvenida Principal" class="font-bold text-gray-700" />
                            <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value="{{ old('titulo', $currentConfig->titulo ?? '') }}" required />
                        </div>

                        <div>
                            <x-input-label for="lugar" value="Nombre de la Iglesia" class="font-bold text-gray-700" />
                            <x-text-input id="lugar" name="lugar" type="text" class="mt-1 block w-full" value="{{ old('lugar', $currentConfig->lugar ?? '') }}" required />
                        </div>

                        <div>
                            <x-input-label for="descripcion" value="Descripción" class="font-bold text-gray-700" />
                            <textarea id="descripcion" name="descripcion" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm p-3" required>{{ old('descripcion', $currentConfig->descripcion ?? '') }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="ubicacion_mapa" value="Enlace de Google Maps (URL)" class="font-bold text-gray-700" />
                            <x-text-input id="ubicacion_mapa" name="ubicacion_mapa" type="text" class="mt-1 block w-full font-mono text-xs text-gray-600" value="{{ old('ubicacion_mapa', $currentConfig->ubicacion_mapa ?? '') }}" />
                        </div>

                        <div class="pt-2">
                            <x-input-label for="imagen" value="Fotografía o Portada de la Parroquia" class="font-bold text-gray-700" />
                            @if($currentConfig && $currentConfig->imagen)
                                <div class="my-3 p-2 bg-gray-50 border border-gray-200 rounded-xl max-w-xs">
                                    <img src="{{ asset('storage/' . $currentConfig->imagen) }}" class="rounded shadow-sm h-32 w-full object-cover">
                                </div>
                            @endif
                            <input id="imagen" name="imagen" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700" />
                        </div>

                        <div class="flex justify-end pt-4 border-t border-gray-100">
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 px-6 py-2.5 rounded-lg font-bold text-xs uppercase tracking-wider shadow">
                                Actualizar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>