<?php $__env->startSection('dashboard'); ?>
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#F46036]">Actualizar Película</h1>
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
            <form action="<?php echo e(route('dashboard.peliculas.update', ['id' => $movie->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Título</label>
                    <input type="text" id="title" name="title"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->title ?? '')); ?>" placeholder="<?php echo e($movie->title ?? 'null'); ?>">

                    <?php $__errorArgs = ['title'];
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
                    <label for="description" class="block text-sm font-semibold text-gray-700">Descripción</label>
                    <input type="text" id="description" name="description"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->description ?? '')); ?>"
                        placeholder="<?php echo e($movie->description ?? 'null'); ?>">
                    <?php $__errorArgs = ['description'];
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
                    <label for="genre" class="block text-sm font-semibold text-gray-700">Genero</label>
                    <input type="text" id="genre" name="genre"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->genre ?? '')); ?>" placeholder="<?php echo e($movie->genre ?? 'null'); ?>">
                    <?php $__errorArgs = ['genre'];
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
                    <label for="year" class="block text-sm font-semibold text-gray-700">Año</label>
                    <input type="text" id="year" name="year"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->year ?? '')); ?>" placeholder="<?php echo e($movie->year ?? 'null'); ?>">
                    <?php $__errorArgs = ['year'];
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
                    <label for="rating" class="block text-sm font-semibold text-gray-700">Calificación</label>
                    <input type="text" id="rating" name="rating"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->rating ?? '')); ?>" placeholder="<?php echo e($movie->rating ?? 'null'); ?>">

                    <?php $__errorArgs = ['rating'];
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
                    <label for="duration" class="block text-sm font-semibold text-gray-700">Duración</label>
                    <input type="text" id="duration" name="duration"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->duration ?? '')); ?>" placeholder="<?php echo e($movie->duration ?? 'null'); ?>">

                    <?php $__errorArgs = ['duration'];
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
                    <label for="director" class="block text-sm font-semibold text-gray-700">Director</label>
                    <input type="text" id="director" name="director"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->director ?? '')); ?>" placeholder="<?php echo e($movie->director ?? 'null'); ?>">

                    <?php $__errorArgs = ['director'];
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
                    <label for="writer" class="block text-sm font-semibold text-gray-700">Escritor</label>
                    <input type="text" id="writer" name="writer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->writer ?? '')); ?>" placeholder="<?php echo e($movie->writer ?? 'null'); ?>">

                    <?php $__errorArgs = ['writer'];
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
                    <label for="cast" class="block text-sm font-semibold text-gray-700">Reparto</label>
                    <input type="text" id="cast" name="cast"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->cast ?? '')); ?>" placeholder="<?php echo e($movie->cast ?? 'null'); ?>">

                    <?php $__errorArgs = ['cast'];
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
                    <label for="rated" class="block text-sm font-semibold text-gray-700">Clasificación</label>
                    <input type="text" id="rated" name="rated"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->rated ?? '')); ?>" placeholder="<?php echo e($movie->rated ?? 'null'); ?>">

                    <?php $__errorArgs = ['rated'];
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
                    <label for="language" class="block text-sm font-semibold text-gray-700">Idioma</label>
                    <input type="text" id="language" name="language"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->language ?? '')); ?>"
                        placeholder="<?php echo e($movie->language ?? 'null'); ?>">

                    <?php $__errorArgs = ['language'];
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
                    <label for="release_date" class="block text-sm font-semibold text-gray-700">Fecha de Estreno</label>
                    <input type="text" id="release_date" name="release_date"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->release_date ?? '')); ?>"
                        placeholder="<?php echo e($movie->release_date ?? 'null'); ?>">

                    <?php $__errorArgs = ['release_date'];
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
                    <label for="country" class="block text-sm font-semibold text-gray-700">País</label>
                    <input type="text" id="country" name="country"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->country ?? '')); ?>" placeholder="<?php echo e($movie->country ?? 'null'); ?>">

                    <?php $__errorArgs = ['country'];
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
                    <label for="poster" class="block text-sm font-semibold text-gray-700">Poster</label>
                    <input type="file" id="poster" name="poster"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->poster ?? '')); ?>">
                    <p class="truncate text-gray-400 text-sm"><?php echo e($movie->poster ?? 'null'); ?></p>
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
                <div class="mb-4">
                    <label for="trailer" class="block text-sm font-semibold text-gray-700">URL del Video
                        (YouTube)</label>
                    <input type="url" id="trailer" name="trailer"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F46036]"
                        value="<?php echo e(old('genre', $movie->trailer ?? '')); ?>" placeholder="<?php echo e($movie->trailer ?? 'null'); ?>">

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
                        Actualizar película
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/actualizarPelicula.blade.php ENDPATH**/ ?>