<?php $__env->startSection('dashboard'); ?>
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Crear Película</h1>
        </div>

        <!-- Mensaje de error general -->
        <?php if(session('error')): ?>
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Mensaje de éxito -->
        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="<?php echo e(route('dashboard.peliculas.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <?php $__currentLoopData = ['title' => 'Título', 'description' => 'Descripción', 'genre' => 'Género', 'year' => 'Año', 'rating' => 'Calificación', 'duration' => 'Duración', 'director' => 'Director', 'writer' => 'Escritor', 'cast' => 'Reparto', 'rated' => 'Clasificación', 'language' => 'Idioma', 'release_date' => 'Fecha de Estreno', 'country' => 'País']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-4">
                        <label for="<?php echo e($field); ?>"
                            class="block text-sm font-semibold text-gray-700"><?php echo e($label); ?></label>
                        <input type="text" id="<?php echo e($field); ?>" name="<?php echo e($field); ?>"
                            class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                            value="<?php echo e(old($field)); ?>"
                            placeholder="<?php
                                if ($label === 'Género') echo 'Action, Drama, Thriller';
                                elseif ($label === 'Año') echo 'AAAA';
                                elseif ($label === 'Calificación') echo '0-10';
                                elseif ($label === 'Duración') echo 'min';
                                elseif ($label === 'Clasificación') echo 'PG, PG-13, R';
                                elseif ($label === 'Fecha de Estreno') echo 'YYYY-MM-DD';
                                else echo 'Ingrese ' . strtolower($label); ?>">
                        <?php $__errorArgs = [$field];
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Campo para Poster -->
                <div class="mb-4">
                    <label for="poster" class="block text-sm font-semibold text-gray-700">Poster</label>
                    <input type="file" id="poster" name="poster"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]">

                    <?php $__errorArgs = ['poster'];
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

                <!-- Campo para el Trailer (URL de YouTube) -->
                <div class="mb-4">
                    <label for="trailer" class="block text-sm font-semibold text-gray-700">URL del Video (YouTube)</label>
                    <input type="url" id="trailer" name="trailer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('trailer')); ?>" placeholder="https://www.youtube.com/watch?v=XXXXXXXX">

                    <?php $__errorArgs = ['trailer'];
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

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#3083DC] text-white px-6 py-2 rounded-full hover:bg-[#1D72B8] transition duration-300">
                        Crear Película
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/crearPelicula.blade.php ENDPATH**/ ?>