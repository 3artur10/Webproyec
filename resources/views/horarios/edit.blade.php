<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Horarios de Misas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 pb-4 mb-6 gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Horarios Registrados</h3>
                        <p class="text-sm text-gray-500 mt-1">Estos horarios se mostrarán automáticamente en la página web pública.</p>
                    </div>
                    
                    <div>
                        <a href="{{ route('horarios.create') }}" class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg shadow transition">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Agregar Horario
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200 text-sm bg-white table-auto">
                        <thead class="bg-gray-50 text-gray-700 uppercase font-semibold text-xs tracking-wider text-left">
                            <tr>
                                <th class="px-6 py-3">Días / Jornada</th>
                                <th class="px-6 py-3">Hora de la Eucaristía</th>
                                <th class="px-6 py-3">Descripción</th>
                                <th class="px-6 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-gray-600">
                            @forelse($horarios as $horario)
                                <tr class="hover:bg-gray-50 transition duration-75">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $horario->dia }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-indigo-600">
                                        {{ $horario->hora }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $horario->descripcion }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3 min-w-[150px]">
                                            <a href="{{ route('horarios.edit', $horario->id) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded shadow-sm transition">
                                                Editar
                                            </a>

                                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este horario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded shadow-sm transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic bg-gray-50/50">
                                        No hay horarios de misa registrados en el sistema.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>