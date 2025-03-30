<?php $__env->startSection('dashboard'); ?>
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#1B998B]">Crear Showtime</h1>
        </div>

        <?php if(session('error')): ?>
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="<?php echo e(route('dashboard.showtime.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="movie_id" class="block text-sm font-semibold text-gray-700">ID Pelicula</label>
                    <select id="movie_id" name="movie_id"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1B998B]"
                        required>
                        <option value="">Selecciona una película</option>
                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($movie->id); ?>" <?php echo e(old('movie_id') == $movie->id ? 'selected' : ''); ?>>
                                <?php echo e($movie->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['movie_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="show_date" class="block text-sm font-semibold text-gray-700">Fecha</label>
                    <input type="date" id="show_date" name="show_date"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1B998B]"
                        value="<?php echo e(old('show_date')); ?>" required min="<?php echo e(date('Y-m-d')); ?>">

                    <?php $__errorArgs = ['show_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4" id="showtime-options">
                    <label class="block text-sm font-semibold text-gray-700">Hora</label>
                    <div class="flex gap-2 justify-evenly items-center mt-2 text-gray-500" id="showtime-buttons">
                        <p class="border border-gray-300 text-gray-400 w-full p-2 rounded-lg text-center bg-gray-100">Eligir
                            fecha</p>
                    </div>
                    <?php $__errorArgs = ['show_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/crearShowtime.blade.php ENDPATH**/ ?>