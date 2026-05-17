<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Horario de Misa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">Formulario de Registro</h3>
                    <p class="text-sm text-gray-500 mt-1">Completa la información para publicar el horario en la página de inicio.</p>
                </div>

                <form method="POST" action="{{ route('horarios.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="dia" value="Días o Jornada " />
                        <x-text-input id="dia" class="block mt-1 w-full" type="text" name="dia" :value="old('dia')" required autofocus placeholder="" />
                        <x-input-error :messages="$errors->get('dia')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="hora" value="Hora de la Eucaristía " />
                        <x-text-input id="hora" class="block mt-1 w-full" type="text" name="hora" :value="old('hora')" required placeholder="" />
                        <x-input-error :messages="$errors->get('hora')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="descripcion" value="Descripción breve de la Misa" />
                        <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required placeholder="" />
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('horarios.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium text-sm rounded-md transition">
                            Cancelar
                        </a>
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                            Guardar Horario
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>