<?php $__env->startSection('dashboard'); ?>
    <div class="p-5">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-[#1B998B]">Showtimes</h1>
            <a href="<?php echo e(route('dashboard.crearShowtime')); ?>"
                class="flex items-center gap-1 rounded-full bg-[#3083DC] px-3 py-1 text-white text-sm">Añadir showtime<img
                    src="<?php echo e(asset('create.svg')); ?>" alt="" class="size-5"></a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-scroll">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left whitespace-nowrap">ID PELICULA</th>
                        <th class="py-3 px-6 text-center whitespace-nowrap">SHOW TIME</th>
                        <th class="py-3 px-6 text-center whitespace-nowrap">SHOW DATE</th>
                        <th class="py-3 px-6 text-center whitespace-nowrap">FECHA DE CREACIÓN</th>
                        <th class="py-3 px-6 text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php $__currentLoopData = $showtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100 text-center" id="row-<?php echo e($showtime->id); ?>">
                            <td class="py-3 px-6 bg-[#1B998B]/90 text-white text-center"><?php echo e($showtime->id); ?></td>
                            <td class="py-3 px-6 hover:cursor-pointer">
                                <p onclick="goToMovieDetails('<?php echo e($showtime->movie_id); ?>')"><?php echo e($showtime->movie_id); ?></p>
                            </td>
                            <td class="py-3 px-6">
                                <p><?php echo e($showtime->show_date); ?></p>
                            </td>
                            <td class="py-3 px-6">
                                <p><?php echo e($showtime->show_time); ?></p>
                            </td>
                            <td class="py-3 px-6">
                                <p class="whitespace-nowrap"><?php echo e($showtime->created_at); ?></p>
                            </td>
                            <td class="py-3 px-6 text-center flex gap-2">
                                <button class="rounded-full bg-[#D7263D] px-3 py-1 text-white"
                                    onclick="deleteShowtime('<?php echo e($showtime->id); ?>')">
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
        function deleteShowtime(showtimeId) {
            if (confirm('¿Estás seguro de que quieres eliminar este showtime?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/dashboard/showtimes/${showtimeId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Showtime eliminado correctamente.');
                            window.location.reload();
                        } else {
                            alert('Error al eliminar el showtime.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al eliminar el showtime.');
                    });
            }
        }

        function goToMovieDetails(movieId) {
            window.location.href = `/dashboard/showtimes/movieDetails/${movieId}`;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/showtimes.blade.php ENDPATH**/ ?>