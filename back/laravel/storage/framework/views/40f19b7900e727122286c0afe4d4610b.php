

<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>TaquillaXpress | Administració</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
    <div class="min-h-screen flex flex-col">
        <div class="flex justify-between items-center p-4 shadow-md sticky top-0 bg-white z-10">
            <p class="text-xl font-bold">TaquillaXpress</p>

            <div class="relative flex items-center gap-2" x-data="{ open: false }">
                <p>Admin</p>
                <button @click="open = !open" class="focus:outline-none">
                    <div class="size-8 rounded-full bg-gray-500 border border-gray-600"></div>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute top-5 right-0 mt-2 w-48 bg-white shadow-md rounded-md overflow-hidden">
                    <ul class="text-gray-700">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Perfil</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Configuració</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Tancar sessió</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex-grow bg-gray-100">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <footer class="bg-gray-800 text-gray-300 py-4 text-center">
            <p class="text-sm">© 2024 TriPlan. Tots els drets reservats.</p>
        </footer>
    </div>
</body>

</html>
<?php /**PATH /var/www/resources/views/index.blade.php ENDPATH**/ ?>