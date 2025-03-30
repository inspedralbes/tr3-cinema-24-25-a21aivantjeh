<?php $__env->startSection('dashboard'); ?>
    <div class="p-5">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-[#D7263D]">Usuarios</h1>
            <a href="<?php echo e(route('dashboard.crearUsuario')); ?>"
                class="flex items-center gap-1 rounded-full bg-[#3083DC] px-3 py-1 text-white text-sm">Crear usuario<img
                    src="<?php echo e(asset('create.svg')); ?>" alt="" class="size-5"></a>
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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100" id="row-<?php echo e($user->id); ?>">
                            <td class="py-3 px-6 bg-[#D7263D]/90 text-white text-center"><?php echo e($user->id); ?></td>
                            <td class="py-3 px-6">
                                <input type="text" id="name-<?php echo e($user->id); ?>" value="<?php echo e($user->name); ?>"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </td>
                            <td class="py-3 px-6">
                                <input type="email" id="email-<?php echo e($user->id); ?>" value="<?php echo e($user->email); ?>"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </td>
                            <td class="py-3 px-6">
                                <input type="password" id="password-<?php echo e($user->id); ?>"
                                    class="bg-transparent border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Nueva contraseña">
                            </td>
                            <td class="py-3 px-6 text-center flex gap-2">
                                <button class="rounded-full bg-[#2A9134] px-3 py-1 text-white"
                                    onclick="updateUser('<?php echo e($user->id); ?>')">
                                    Guardar
                                </button>
                                <button class="rounded-full bg-[#D7263D] px-3 py-1 text-white"
                                    onclick="deleteUser('<?php echo e($user->id); ?>')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/usuarios.blade.php ENDPATH**/ ?>