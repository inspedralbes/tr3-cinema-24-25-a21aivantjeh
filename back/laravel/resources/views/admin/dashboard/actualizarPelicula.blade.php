@extends('layout.index')

@section('dashboard')
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Actualizar Película</h1>
        </div>

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('dashboard.peliculas.update', ['id' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="title" name="title"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->title ?? '') }}" placeholder="{{ $movie->title ?? 'null' }}">

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700">Descripción</label>
                    <input type="text" id="description" name="description"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->description ?? '') }}"
                        placeholder="{{ $movie->description ?? 'null' }}">
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-semibold text-gray-700">Genero</label>
                    <input type="text" id="genre" name="genre"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->genre ?? '') }}" placeholder="{{ $movie->genre ?? 'null' }}">
                    @error('genre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="year" class="block text-sm font-semibold text-gray-700">Año</label>
                    <input type="text" id="year" name="year"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->year ?? '') }}" placeholder="{{ $movie->year ?? 'null' }}">
                    @error('year')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-semibold text-gray-700">Calificación</label>
                    <input type="text" id="rating" name="rating"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->rating ?? '') }}" placeholder="{{ $movie->rating ?? 'null' }}">

                    @error('rating')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-sm font-semibold text-gray-700">Duración</label>
                    <input type="text" id="duration" name="duration"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->duration ?? '') }}" placeholder="{{ $movie->duration ?? 'null' }}">

                    @error('duration')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="director" class="block text-sm font-semibold text-gray-700">Director</label>
                    <input type="text" id="director" name="director"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->director ?? '') }}" placeholder="{{ $movie->director ?? 'null' }}">

                    @error('director')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="writer" class="block text-sm font-semibold text-gray-700">Escritor</label>
                    <input type="text" id="writer" name="writer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->writer ?? '') }}" placeholder="{{ $movie->writer ?? 'null' }}">

                    @error('writer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cast" class="block text-sm font-semibold text-gray-700">Reparto</label>
                    <input type="text" id="cast" name="cast"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->cast ?? '') }}" placeholder="{{ $movie->cast ?? 'null' }}">

                    @error('cast')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rated" class="block text-sm font-semibold text-gray-700">Clasificación</label>
                    <input type="text" id="rated" name="rated"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->rated ?? '') }}" placeholder="{{ $movie->rated ?? 'null' }}">

                    @error('rated')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="language" class="block text-sm font-semibold text-gray-700">Idioma</label>
                    <input type="text" id="language" name="language"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->language ?? '') }}"
                        placeholder="{{ $movie->language ?? 'null' }}">

                    @error('language')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="release_date" class="block text-sm font-semibold text-gray-700">Fecha de Estreno</label>
                    <input type="text" id="release_date" name="release_date"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->release_date ?? '') }}"
                        placeholder="{{ $movie->release_date ?? 'null' }}">

                    @error('release_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="country" class="block text-sm font-semibold text-gray-700">País</label>
                    <input type="text" id="country" name="country"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->country ?? '') }}" placeholder="{{ $movie->country ?? 'null' }}">

                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="poster" class="block text-sm font-semibold text-gray-700">Poster</label>
                    <input type="file" id="poster" name="poster"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->poster ?? '') }}">
                    <p class="truncate text-gray-400 text-sm">{{ $movie->poster ?? 'null' }}</p>
                    @error('poster')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="trailer" class="block text-sm font-semibold text-gray-700">URL del Video
                        (YouTube)</label>
                    <input type="url" id="trailer" name="trailer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old('genre', $movie->trailer ?? '') }}" placeholder="{{ $movie->trailer ?? 'null' }}">

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
