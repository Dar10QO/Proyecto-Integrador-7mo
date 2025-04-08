<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-xl font-semibold">Objetivos del Usuario</p>
                </div>
                <div class="p-6 bg-white shadow-md rounded-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Agregar un Nuevo Objetivo</h2>

                    <form action="{{ route('ObjetivosU.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="objetivo" class="block text-gray-700 font-medium mb-2">Ingrese el objetivo:</label>
                            <input type="text" id="objetivo" name="objetivo" 
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                placeholder="Escribe tu objetivo aquí..." 
                                required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($objetivos as $objetivo)
                    <div class="bg-gray-100 p-4 shadow rounded">
                        <h3 class="font-semibold text-lg text-gray-800">Objetivo</h3>
                        <p class="text-gray-600 mt-2">{{ $objetivo->objetive }}</p>
                        <p class="text-sm text-gray-500 mt-1">Creado el: {{ $objetivo->created_at->format('d/m/Y') }}</p>
                        
                        <form action="{{ route('ObjetivosU.destroy', $objetivo->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="w-full py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-colors shadow-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este objetivo?')">
                                <i class="fas fa-trash-alt mr-2"></i> Eliminar
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>