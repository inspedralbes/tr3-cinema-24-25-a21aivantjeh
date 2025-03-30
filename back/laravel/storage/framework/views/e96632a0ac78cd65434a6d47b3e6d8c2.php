<?php $__env->startSection('dashboard'); ?>
    <div class="p-5">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-[#F46036]">Peliculas</h1>
            <a href="<?php echo e(route('dashboard.crearPelicula')); ?>"
                class="flex items-center gap-1 rounded-full bg-[#3083DC] px-3 py-1 text-white text-sm">Crear pelicula<img
                    src="<?php echo e(asset('create.svg')); ?>" alt="" class="size-5"></a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-scroll">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">TITULO</th>
                        <th class="py-3 px-6 text-left">DIRECTOR</th>
                        <th class="py-3 px-6 text-left">AÑO</th>
                        <th class="py-3 px-6 text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
<<<<<<< HEAD:back/laravel/storage/framework/views/e96632a0ac78cd65434a6d47b3e6d8c2.php
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100 whitespace-nowrap" id="row-<?php echo e($movie->id); ?>">
                            <td class="py-3 px-6 bg-[#F46036]/90 text-white text-center"><?php echo e($movie->id); ?></td>
=======
                    @foreach ($movies as $movie)
                        <tr class="border-b border-gray-200 hover:bg-gray-100" id="row-{{ $movie->id }}">
                            <td class="py-3 px-6 bg-[#F46036]/90 text-white text-center">{{ $movie->id }}</td>
>>>>>>> parent of 6fa2cc07 (inicialización de test):back/laravel/resources/views/admin/dashboard/peliculas.blade.php
                            <td class="py-3 px-6">
                                <p><?php echo e($movie->title); ?></p>
                            </td>
                            <td class="py-3 px-6">
                                <p><?php echo e($movie->director); ?></p>
                            </td>
                            <td class="py-3 px-6">
                                <p><?php echo e($movie->year); ?></p>
                            </td>
                            <td class="py-3 px-6 text-center flex gap-2">
<<<<<<< HEAD:back/laravel/storage/framework/views/e96632a0ac78cd65434a6d47b3e6d8c2.php
                                <a href="<?php echo e(route('dashboard.actualizarPelicula', $movie)); ?>"
                                class="flex items-center gap-1 rounded-full bg-[#2A9134] px-3 py-1 text-white text-sm">Editar</a>
                                <a href="<?php echo e(route('dashboard.movieDetails', $movie)); ?>"
                                    class="flex items-center gap-1 rounded-full bg-[#153131] px-3 py-1 text-white text-sm">Más detalles</a>
=======
                                <a href="{{ route('dashboard.actualizarPelicula', $movie) }}"
                                    class="flex items-center gap-1 rounded-full bg-[#2A9134] px-3 py-1 text-white text-sm">Editar</a>
>>>>>>> parent of 6fa2cc07 (inicialización de test):back/laravel/resources/views/admin/dashboard/peliculas.blade.php
                                <button class="rounded-full bg-[#D7263D] px-3 py-1 text-white"
                                    onclick="deletePelicula('<?php echo e($movie->id); ?>')">
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
        // function updateUser(userId) {
        //     const name = document.getElementById(`name-${userId}`).value;
        //     const email = document.getElementById(`email-${userId}`).value;
        //     const password = document.getElementById(`password-${userId}`).value;
        //     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        //     fetch(`/dashboard/usuarios/${userId}`, {
        //             method: 'PUT',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': csrfToken,
        //             },
        //             body: JSON.stringify({
        //                 name,
        //                 email,
        //                 password
        //             }),
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Usuario actualizado correctamente.');
        //                 window.location.reload();
        //             } else {
        //                 alert('Error al actualizar el usuario.');
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Hubo un error al actualizar el usuario.');
        //         });
        // }

        function deletePelicula(movieId) {
            if (confirm('¿Estás seguro de que quieres eliminar esta pelicula?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/dashboard/pelicula/${movieId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Pelicula eliminada correctamente.');
                            window.location.reload();
                        } else {
                            alert('Error al eliminar la pelicula.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al eliminar la pelicula.');
                    });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/peliculas.blade.php ENDPATH**/ ?>