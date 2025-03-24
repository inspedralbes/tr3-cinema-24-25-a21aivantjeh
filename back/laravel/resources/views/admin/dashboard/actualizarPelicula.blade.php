@extends('layout.index')

@section('dashboard')
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Actualizar Película</h1>
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
                <div class="mb-4">
                    <label for="title"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="title" name="title"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->title) }}" placeholder="{{ $movie->title }}">

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="description" name="description"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->description) }}" placeholder="{{ $movie->description }}">

                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="genre"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="genre" name="genre"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->genre) }}" placeholder="{{ $movie->genre }}">

                    @error('genre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="year"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="year" name="year"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->year) }}" placeholder="{{ $movie->year }}">

                    @error('year')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rating"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="rating" name="rating"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->rating) }}" placeholder="{{ $movie->rating }}">

                    @error('rating')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="duration"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="duration" name="duration"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->duration) }}" placeholder="{{ $movie->duration }}">

                    @error('duration')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="director"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="director" name="director"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->director) }}" placeholder="{{ $movie->director }}">

                    @error('director')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="writer"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="writer" name="writer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->writer) }}" placeholder="{{ $movie->writer }}">

                    @error('writer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cast"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="cast" name="cast"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->cast) }}" placeholder="{{ $movie->cast }}">

                    @error('cast')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rated"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="rated" name="rated"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->rated) }}" placeholder="{{ $movie->rated }}">

                    @error('rated')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="language"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="language" name="language"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->language) }}" placeholder="{{ $movie->language }}">

                    @error('language')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="release_date"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="release_date" name="release_date"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->release_date) }}" placeholder="{{ $movie->release_date }}">

                    @error('release_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="poster"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="poster" name="poster"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->poster) }}" placeholder="{{ $movie->poster }}">

                    @error('poster')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-4">
                    <label for="video"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="video" name="video"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->video) }}" placeholder="{{ $movie->video }}">

                    @error('video')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="mb-4">
                    <label for="country"
                        class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="country" name="country"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="{{ old($movie->country) }}" placeholder="{{ $movie->country }}">

                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


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
