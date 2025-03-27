@extends('layout.index')

@section('dashboard')
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#1B998B]">Crear Showtime</h1>
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
            <form action="{{ route('dashboard.showtime.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="movie_id" class="block text-sm font-semibold text-gray-700">ID Pelicula</label>
                    <select id="movie_id" name="movie_id"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1B998B]"
                        required>
                        <option value="">Selecciona una película</option>
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                                {{ $movie->title }}</option>
                        @endforeach
                    </select>

                    @error('movie_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="show_date" class="block text-sm font-semibold text-gray-700">Fecha</label>
                    <input type="date" id="show_date" name="show_date"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1B998B]"
                        value="{{ old('show_date') }}" required min="{{ date('Y-m-d') }}">

                    @error('show_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4" id="showtime-options">
                    <label class="block text-sm font-semibold text-gray-700">Hora</label>
                    <div class="flex gap-2 justify-evenly items-center mt-2 text-gray-500" id="showtime-buttons">
                        <p class="border border-gray-300 text-gray-400 w-full p-2 rounded-lg text-center bg-gray-100">Eligir
                            fecha</p>
                    </div>
                    @error('show_time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="bg-[#3083DC] text-white px-6 py-2 rounded-full hover:bg-[#1D72B8] transition duration-300">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('show_date').addEventListener('change', function() {
            let showDate = this.value;
            if (showDate) {
                fetch(`/dashboard/showtimes/check-availability?date=${showDate}`)
                    .then(response => response.json())
                    .then(data => {
                        const showtimeButtons = document.getElementById('showtime-buttons');
                        showtimeButtons.innerHTML = '';

                        if (data.availableTimes.length > 0) {
                            data.availableTimes.forEach(time => {
                                const div = document.createElement('div');
                                div.innerHTML = `
                            <input type="radio" name="show_time" id="${time}" value="${time}" required class="hidden peer">
                            <label for="${time}" class="block w-full p-1 px-3 border-2 border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-[#1B998B] peer-checked:text-white peer-checked:border-black hover:bg-gray-200">
                                ${time}
                            </label>
                        `;
                                showtimeButtons.appendChild(div);
                            });
                        } else {
                            showtimeButtons.innerHTML =
                                '<p class="text-gray-400 p-2 border-2 border-gray-300 rounded-lg">No hay horarios disponibles para esta fecha.</p>';
                        }
                    })
                    .catch(error => console.error('Error al verificar disponibilidad:', error));
            }
        });
    </script>
@endsection
