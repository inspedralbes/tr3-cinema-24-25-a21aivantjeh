<?php $__env->startSection('dashboard'); ?>
    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#D7263D]">Crear Usuario</h1>
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
            <form action="<?php echo e(route('dashboard.usuarios.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Nombre</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D7263D]"
                        value="<?php echo e(old('name')); ?>" required placeholder="Pepe">

                    <?php $__errorArgs = ['name'];
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
                    <label for="email" class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D7263D]"
                        value="<?php echo e(old('email')); ?>" required placeholder="ejemplo@ejemplo.com">

                    <?php $__errorArgs = ['email'];
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
                    <label for="password" class="block text-sm font-semibold text-gray-700">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D7263D]"
                        required placeholder="*****">

                    <?php $__errorArgs = ['password'];
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
                        Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard/crearUsuario.blade.php ENDPATH**/ ?>