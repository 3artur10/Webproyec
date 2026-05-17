<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6 text-gray-900 text-left">
                    <h3 class="text-xl font-black text-indigo-950 tracking-tight">¡Bienvenido al Sistema Parroquial!</h3>
                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Has iniciado sesión correctamente como administrador. Utiliza la barra de navegación superior para acceder al listado de los jóvenes inscritos en los sacramentos, gestionar los horarios de misa, programar nuevos eventos o actualizar los contenidos informativos de la página web pública.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 text-left">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="text-indigo-600 text-2xl mb-2">📋</div>
                    <h4 class="font-bold text-gray-900 text-base">Inscritos</h4>
                    <p class="text-xs text-gray-500 mt-1">Controla y revisa las fichas de inscripción para los sacramentos.</p>
                    <a href="{{ route('inscritos.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 inline-block mt-3">Ir a Inscritos →</a>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="text-amber-500 text-2xl mb-2">🗓️</div>
                    <h4 class="font-bold text-gray-900 text-base">Horarios de Misa</h4>
                    <p class="text-xs text-gray-500 mt-1">Modifica o añade las horas de las eucaristías semanales.</p>
                    <a href="{{ route('horarios.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 inline-block mt-3">Gestionar Horarios →</a>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="text-emerald-500 text-2xl mb-2">⚙️</div>
                    <h4 class="font-bold text-gray-900 text-base">Contenido Web</h4>
                    <p class="text-xs text-gray-500 mt-1">Cambia los textos, el banner principal y el link de Google Maps.</p>
                    <a href="{{ route('admin.configuracion.edit') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 inline-block mt-3">Editar Portada →</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>