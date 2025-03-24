@extends('layout.index')

@section('dashboard')
    <div class="bg-cyan-700 p-2">
        <div class="flex items-center">
            <h1 class="text-4xl font-bold text-white min-h-20 flex items-end">Dashboard</h1>
        </div>
        <div class="grid grid-cols-2 gap-4 py-2 text-gray-300 font-bold text-2xl">
            <!-- Enlace a Usuarios -->
            <a href="{{ route('dashboard.usuarios') }}" class="bg-[#D7263D] min-h-32 col-span-2 flex items-center justify-center rounded-xl transition border-2">
                <p>Usuarios</p>
            </a>

            <!-- Enlace a Películas -->
            <a href="{{ route('dashboard.peliculas') }}" class="bg-[#F46036] min-h-32 col-span-2 flex items-center justify-center rounded-xl transition border-2">
                <p>Películas</p>
            </a>

            <!-- Enlace a Entradas -->
            <a href="{{ route('dashboard.entradas') }}" class="bg-[#2E294E] min-h-20 flex items-center justify-center rounded-xl transition border-2">
                <p>Entradas</p>
            </a>

            <!-- Enlace a Salas -->
            <a href="{{ route('dashboard.salas') }}" class="bg-[#1B998B] min-h-20 flex items-center justify-center rounded-xl transition border-2">
                <p>Salas</p>
            </a>

            <!-- Enlace a Showtimes -->
            <a href="{{ route('dashboard.showtimes') }}" class="bg-[#C5D86D] min-h-32 col-span-2 flex items-center justify-center rounded-xl transition border-2">
                <p class="text-gray-700">Showtimes</p>
            </a>
        </div>
        <p class="text-center text-cyan-900 mt-16">Pagina de administracion | TaquillaXpress | 2025</p>
    </div>
@endsection