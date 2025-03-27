@extends('layout.index')

@section('dashboard')
    <div class="p-5">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-[#2E294E]">Entradas</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-scroll">
            <table class="border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">EMAIL</th>
                        <th class="py-3 px-6 text-center whitespace-nowrap">SHOW ID</th>
                        <th class="py-3 px-6 text-center">FILA</th>
                        <th class="py-3 px-6 text-center">COLUMNA</th>
                        <th class="py-3 px-6 text-center">VIP</th>
                        <th class="py-3 px-6 text-center">PRECIO</th>
                        <th class="py-3 px-6 text-center whitespace-nowrap">FECHA DE COMPRA</th>
                        {{-- <th class="py-3 px-6 text-center">ACCIONES</th> --}}
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($entradas as $entrada)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 text-center" id="row-{{ $entrada->id }}">
                            <td class="py-3 px-6 bg-[#2E294E]/90 text-white text-center">{{ $entrada->id }}</td>
                            <td class="py-3 px-6">
                                <p>{{ $entrada->user_email }}</p>
                            </td>
                            <td class="py-3 px-6">
                                <p class="cursor-pointer" onclick="goToShowtime()">{{ $entrada->showtime_id }}</p>
                            </td>
                            <td class="py-3 px-6">
                                <p>{{ $entrada->fila }}</p>
                            </td>
                            <td class="py-3 px-6">
                                <p>{{ $entrada->columna }}</p>
                            </td>
                            <td class="py-3 px-6">
                                <p>{{ $entrada->vip? 'SI' : 'NO' }}</p>
                            </td>
                            <td class="py-3 px-6">
                                <p>{{ $entrada->precio }} €</p>
                            </td>
                            <td class="py-3 px-6">
                                <p class="whitespace-nowrap">{{ $entrada->created_at }}</p>
                            </td>
                            {{-- <td class="py-3 px-6 text-center flex gap-2">
                                <button class="rounded-full bg-[#D7263D] px-3 py-1 text-white"
                                    onclick="deleteEntrada('{{ $entrada->id }}')">
                                    Eliminar
                                </button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function deleteEntrada(movieId) {
            if (confirm('¿Estás seguro de que quieres eliminar esta entrada?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/dashboard/entradas/${movieId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Entrada eliminada correctamente.');
                            window.location.reload();
                        } else {
                            alert('Error al eliminar la entrada.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al eliminar la entrada.');
                    });
            }
        }

        function goToShowtime() {
            window.location.href = `/dashboard/showtimes`;
        }
    </script>
@endsection
