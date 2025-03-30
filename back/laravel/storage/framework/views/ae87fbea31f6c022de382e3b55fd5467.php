<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-center min-h-screen bg-gray-900 p-2">
        <div class="flex flex-col bg-gray-800/50 p-8 rounded-lg border-gray-500 border-2 max-w-sm w-full gap-5">
            <div class="flex items-center justify-center w-full gap-2 mb-5">
                <h1 class="text-5xl font-bold text-red-500 flex items-center">
                    T<span class="text-white text-4xl">aquilla</span>X<span class="text-white text-4xl">press</span>
                </h1>
                <img src="<?php echo e(asset('logo-app.svg')); ?>" alt="Logo Instituto" class="size-10">
            </div>
            <form action="" method="POST">
                <?php echo csrf_field(); ?>
                <input type="password" id="password" name="password" placeholder="Contrasenya d'admin"
                    class="bg-gray-700 text-white p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-red-500">
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md transition">
                    Iniciar Sessió
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/login.blade.php ENDPATH**/ ?>