<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicar Nuevo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">Detalles de la Actividad</h3>
                    <p class="text-sm text-gray-500 mt-1">Ingrese los datos y el afiche correspondiente al evento comunitario.</p>
                </div>

                <form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="titulo" value="Título del Evento" />
                        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus placeholder="" />
                    </div>

                    <div>
                        <x-input-label for="descripcion" value="Descripción+" />
                        <textarea id="descripcion" name="descripcion" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required placeholder="">{{ old('descripcion') }}</textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="fecha" value="Fecha de Realización" />
                            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required />
                            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="lugar" value="Lugar / Ubicación interna" />
                            <x-text-input id="lugar" class="block mt-1 w-full" type="text" name="lugar" :value="old('lugar')" required placeholder="" />
                            <x-input-error :messages="$errors->get('lugar')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="imagen" value="Afiche publicitario o Imagen destacada (Formatos: JPG, PNG - Máx: 2MB)" />
                        <input id="imagen" type="file" name="imagen" class="block mt-2 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('eventos.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium text-sm rounded-md transition">
                            Cancelar
                        </a>
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                            Publicar Evento
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>