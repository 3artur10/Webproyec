<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-4xl mx-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Formulario de Inscripción a las Catequesis') }}
            </h2>
            <a href="/" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs uppercase tracking-wider rounded-lg transition">
                🏠 Volver al Inicio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl p-6 sm:p-10 text-gray-900 border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4 text-left">
                    <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold uppercase tracking-wider rounded mb-2">Registro Público</span>
                    <h3 class="text-2xl font-black text-gray-950 tracking-tight">Ingreso de Datos del Postulante</h3>
                    <p class="text-sm text-gray-500 mt-1">Por favor, rellene todos los campos con la información exacta para la asignación del sacramento.</p>
                </div>

                <form method="POST" action="{{ route('inscritos.store') }}" class="space-y-6 text-left">
                    @csrf

                    <div>
                        <x-input-label for="nombre_joven" value="Nombre Completo del Joven" class="font-bold text-gray-700" />
                        <x-text-input id="nombre_joven" class="block mt-1 w-full" type="text" name="nombre_joven" :value="old('nombre_joven')" required autofocus placeholder="" max="255" />
                        <x-input-error :messages="$errors->get('nombre_joven')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nombre_responsable" value="Nombre Responsable" class="font-bold text-gray-700" />
                        <x-text-input id="nombre_responsable" class="block mt-1 w-full" type="text" name="nombre_responsable" :value="old('nombre_responsable')" required placeholder="" max="255" />
                        <x-input-error :messages="$errors->get('nombre_responsable')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <x-input-label for="dui" value="DUI del Responsable " class="font-bold text-gray-700" />
                            <x-text-input id="dui" class="block mt-1 w-full font-mono tracking-wider" type="text" name="dui" :value="old('dui')" required placeholder="" maxlength="10" />
                            <x-input-error :messages="$errors->get('dui')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="telefono" value="Número de Teléfono" class="font-bold text-gray-700" />
                            <x-text-input id="telefono" class="block mt-1 w-full font-mono tracking-wider" type="text" name="telefono" :value="old('telefono')" required placeholder="" maxlength="9" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                    </div>

                    <div>
                        <x-input-label for="sacramento_id" value="Sacramento al que desea inscribirse" class="font-bold text-gray-700" />
                        <select id="sacramento_id" name="sacramento_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-10 px-3 text-sm bg-white" required>
                            <option value="" disabled selected>-- Seleccione un sacramento del listado --</option>
                            @foreach($sacramentos as $sacramento)
                                <option value="{{ $sacramento->id }}" {{ old('sacramento_id') == $sacramento->id ? 'selected' : '' }}>
                                    ✨ {{ $sacramento->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('sacramento_id')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                        <a href="/" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs uppercase tracking-wider rounded-lg transition">
                            Cancelar
                        </a>
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 py-2.5 px-6 rounded-lg text-xs font-bold uppercase tracking-wider shadow-md">
                            Enviar 
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // --- MÁSCARA AUTOMÁTICA PARA EL DUI (00000000-0) ---
            const inputDui = document.getElementById('dui');
            if (inputDui) {
                inputDui.addEventListener('input', function(e) {
                    // Remueve todo lo que no sea número
                    let valor = e.target.value.replace(/\D/g, '');
                    
                    // Si el usuario ya metió los 8 dígitos, inserta el guión automáticamente
                    if (valor.length > 8) {
                        valor = valor.substring(0, 8) + '-' + valor.substring(8, 9);
                    }
                    
                    e.target.value = valor;
                });
            }

            // --- MÁSCARA AUTOMÁTICA PARA EL TELÉFONO (0000-0000) ---
            const inputTelefono = document.getElementById('telefono');
            if (inputTelefono) {
                inputTelefono.addEventListener('input', function(e) {
                    // Remueve todo lo que no sea número
                    let valor = e.target.value.replace(/\D/g, '');
                    
                    // Inserta el guión exactamente en la mitad de los 8 números
                    if (valor.length > 4) {
                        valor = valor.substring(0, 4) + '-' + valor.substring(4, 8);
                    }
                    
                    e.target.value = valor;
                });
            }
            
        });
    </script>
</x-app-layout>