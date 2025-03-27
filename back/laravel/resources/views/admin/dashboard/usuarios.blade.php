@extends('layout.index')

@section('dashboard')
    <div class="p-5">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-[#D7263D]">Usuarios</h1>
            <a href="{{ route('dashboard.crearUsuario') }}" class="flex items-center gap-1 rounded-full bg-[#3083DC] px-3 py-1 text-white text-sm">Crear usuario<img src="{{ asset('create.svg') }}" alt="" class="size-5"></a>
        </div>

        <div class="bg-[white] shadow-md rounded-lg overflow-x-scroll">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Password</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-100" id="row-{{ $user->id }}">
                            <td class="py-3 px-6 bg-[#D7263D]/90 text-white text-center">{{ $user->id }}</td>
                            <td class="py-3 px-6">
                                <input type="text" id="name-{{ $user->id }}" value="{{ $user->name }}"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </td>
                            <td class="py-3 px-6">
                                <input type="email" id="email-{{ $user->id }}" value="{{ $user->email }}"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </td>
                            <td class="py-3 px-6">
                                <input type="password" id="password-{{ $user->id }}"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Nueva contraseña">
                            </td>
                            <td class="py-3 px-6 text-center flex gap-2">
                                <button class="rounded-full bg-[#2A9134] px-3 py-1 text-white"
                                    onclick="updateUser('{{ $user->id }}')">
                                    Guardar
                                </button>
                                <button class="rounded-full bg-[#D7263D] px-3 py-1 text-white"
                                    onclick="deleteUser('{{ $user->id }}')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateUser(userId) {
            const name = document.getElementById(`name-${userId}`).value;
            const email = document.getElementById(`email-${userId}`).value;
            const password = document.getElementById(`password-${userId}`).value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/dashboard/usuarios/${userId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        name,
                        email,
                        password
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Usuario actualizado correctamente.');
                        window.location.reload();
                    } else {
                        alert('Error al actualizar el usuario.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al actualizar el usuario.');
                });
        }

        function deleteUser(userId) {
            if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/dashboard/usuarios/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Usuario eliminado correctamente.');
                            window.location.reload();
                        } else {
                            alert('Error al eliminar el usuario.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al eliminar el usuario.');
                    });
            }
        }
    </script>
@endsection
