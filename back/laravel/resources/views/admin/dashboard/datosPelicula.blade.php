@extends('layout.index')

@section('dashboard')
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Detalles de la Película</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="mb-4 flex justify-center">
                @if ($movie->poster)
                    <img src="{{ $movie->poster }}" alt="Póster de {{ $movie->title }}" class="h-auto rounded-lg border-4 p-2">
                @else
                    <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">No disponible</p>
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Título</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->title ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Descripción</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">
                    {{ $movie->description ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Género</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->genre ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Año</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->year ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Calificación</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->rating ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Duración</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->duration ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Director</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->director ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Reparto</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->cast ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Clasificación</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->rated ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Idioma</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->language ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Fecha de Estreno</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">
                    {{ $movie->release_date ?? 'No disponible' }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">País</label>
                <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">{{ $movie->country ?? 'No disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Trailer</label>
                @if ($movie->trailer)
                    <a href="{{ $movie->trailer }}" target="_blank" class="text-blue-500 underline">Ver Trailer</a>
                @else
                    <p class="p-3 mt-2 border border-gray-300 rounded-lg bg-gray-100">No disponible</p>
                @endif
            </div>
        </div>
        <div class="mt-4 flex justify-center">
            <p class="text-gray-400 pb-1 border-b-2 border-gray-300 cursor-pointer" onclick="goToShowtimes()">Volver a la
                pagina anterior</p>
        </div>
    </div>
    <script>
        function goToShowtimes() {
            window.history.back();
        }
    </script>
@endsection
