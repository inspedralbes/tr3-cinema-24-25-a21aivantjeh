<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('movie.svg') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TaquillaXpress | Administració</title>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-900 p-2">
        <div class="flex flex-col bg-gray-800/50 p-8 rounded-lg border-gray-500 border-2 max-w-sm w-full gap-5">
            <div class="flex items-center justify-center w-full gap-2 mb-5">
                <h1 class="text-5xl font-bold text-red-500 flex items-center">
                    T<span class="text-white text-4xl">aquilla</span>X<span class="text-white text-4xl">press</span>
                </h1>
                <img src="{{ asset('logo-app.svg') }}" alt="Logo Instituto" class="size-10">
            </div>
            <form action="" method="POST">
                <input type="password" id="password" name="password" placeholder="Contrasenya d'admin"
                    class="bg-gray-700 text-white p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-red-500">
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md transition">
                    Iniciar Sessió
                </button>
            </form>
        </div>
    </div>
</body>

</html>