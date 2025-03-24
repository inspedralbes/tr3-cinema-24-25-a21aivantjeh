@extends('layout.index')

@section('dashboard')
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Crear Película</h1>
        </div>

        <!-- Mensaje de error general -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('dashboard.peliculas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach (['title' => 'Título', 'description' => 'Descripción', 'genre' => 'Género', 'year' => 'Año', 'rating' => 'Calificación', 'duration' => 'Duración', 'director' => 'Director', 'writer' => 'Escritor', 'cast' => 'Reparto', 'rated' => 'Clasificación', 'language' => 'Idioma', 'release_date' => 'Fecha de Estreno', 'country' => 'País'] as $field => $label)
                    <div class="mb-4">
                        <label for="{{ $field }}"
                            class="block text-sm font-semibold text-gray-700">{{ $label }}</label>
                        <input type="text" id="{{ $field }}" name="{{ $field }}"
                            class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                            value="{{ old($field) }}" placeholder="Ingrese {{ strtolower($label) }}">

                        @error($field)
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <!-- Campo para Poster -->
                <div class="mb-4">
                    <label for="poster" class="block text-sm font-semibold text-gray-700">Poster</label>
                    <input type="file" id="poster" name="poster"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]">

                    @error('poster')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para el Trailer (URL de YouTube) -->
                <div class="mb-4">
                    <label for="trailer" class="block text-sm font-semibold text-gray-700">URL del Video (YouTube)</label>
                    <input type="url" id="trailer" name="trailer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('trailer') }}" placeholder="https://www.youtube.com/watch?v=XXXXXXXX">

                    @error('trailer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#3083DC] text-white px-6 py-2 rounded-full hover:bg-[#1D72B8] transition duration-300">
                        Crear Película
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
