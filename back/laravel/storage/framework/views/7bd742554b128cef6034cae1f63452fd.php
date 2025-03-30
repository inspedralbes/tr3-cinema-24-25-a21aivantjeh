<?php $__env->startSection('dashboard'); ?>
    <div class="bg-[#101828] p-2 flex flex-col gap-4 h-[calc(100vh-64px)] md:px-40">
        <div class="flex items-center border-b-4 border-double border-gray-200 pb-1">
            <h1 class="text-4xl font-bold text-white min-h-20 flex items-end">Dashboard</h1>
        </div>
        <div class="grid grid-cols-2 gap-4 py-2 text-gray-300 font-bold text-2xl">
            <a href="<?php echo e(route('dashboard.usuarios')); ?>" class="bg-[#D7263D] min-h-32 col-span-2 flex items-center justify-center rounded-xl transition border-2">
                <p>Usuarios</p>
            </a>

            <a href="<?php echo e(route('dashboard.peliculas')); ?>" class="bg-[#F46036] min-h-32 col-span-2 flex items-center justify-center rounded-xl transition border-2">
                <p>Películas</p>
            </a>

            <a href="<?php echo e(route('dashboard.entradas')); ?>" class="bg-[#2E294E] md:col-span-2 min-h-32 flex items-center justify-center rounded-xl transition border-2">
                <p>Entradas</p>
            </a>

            <a href="<?php echo e(route('dashboard.showtimes')); ?>" class="bg-[#1B998B] md:col-span-2 min-h-32 flex items-center justify-center rounded-xl transition border-2">
                <p>Showtimes</p>
            </a>
        </div>
        <p class="text-center text-gray-700">Pagina de administracion | TaquillaXpress | 2025</p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>