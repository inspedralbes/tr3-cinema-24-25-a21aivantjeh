<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>TaquillaXpress | Administració</title>
    <link rel="shortcut icon" href="<?php echo e(asset('movie.svg')); ?>" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
    <div class="min-h-screen flex flex-col">
        <div class="flex justify-between items-center p-4 shadow-md sticky top-0 bg-white z-10 w-full">
            <div class="flex items-center gap-2">
                <img src="<?php echo e(asset('cine.svg')); ?>" alt="" class="size-6">
                <a href="<?php echo e(route('dashboard')); ?>" class="text-xl font-bold">TaquillaXpress</a>
            </div>

            <?php if(auth()->guard('admin')->check()): ?>
                <div class="relative flex items-center gap-2" x-data="{ open: false }">
                    <p>Admin</p>
                    <button @click="open = !open" class="focus:outline-none">
                        <div class="size-8 rounded-full bg-[#101828] border border-gray-600">
                            <img src="<?php echo e(asset('persona.svg')); ?>" alt="User" class="w-8 h-8">
                        </div>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute top-5 right-0 mt-2 w-48 bg-white shadow-md rounded-md overflow-hidden">
                        <ul class="text-gray-700">
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex-grow">
            <?php if(auth()->guard('admin')->check()): ?>
                <!-- Si el usuario está autenticado, mostrar el dashboard -->
                <?php echo $__env->yieldContent('dashboard'); ?>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->guest()): ?>
                <!-- Si el usuario no está autenticado, mostrar el login -->
                <?php echo $__env->yieldContent('content'); ?>
            <?php endif; ?>
        </div>

        
    </div>
</body>

</html>
<?php /**PATH /var/www/resources/views/layout/index.blade.php ENDPATH**/ ?>