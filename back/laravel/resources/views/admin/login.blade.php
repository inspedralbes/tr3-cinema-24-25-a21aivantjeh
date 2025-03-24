@extends('layout.index')

@section('content')
    <div class="flex items-center justify-center min-h-[80vh] p-5">
        <div class="flex flex-col p-8 rounded-lg w-full gap-10">
            <div class="flex flex-col items-center justify-center w-full">
                <img src="{{ asset('tickets-admin.svg') }}" alt="Logo Instituto" class="size-12">
                <h1 class="text-3xl font-bold text-gray-800 flex items-end font-serif">
                    T<span class="text-xl">aquillaXpres</span>S
                </h1>
                {{-- <img src="{{ asset('tickets-admin.svg') }}" alt="Logo Instituto" class="size-8"> --}}
            </div>
            <form action="{{ route('login.post') }}" method="POST" class="grid gap-5">
                @csrf
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-bold text-gray-800">Administrador</p>
                    <input type="password" id="password" name="password" placeholder="Ingrese la contraseña"
                        class="border-b-2 border-black bg-gray-100/50 text-black p-3 w-full focus:outline-none focus:ring-2 focus:ring-gray-300 transition ease-in-out duration-300">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="p-2 bg-black text-white text-md font-bold rounded-md transition ease-in-out duration-300">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
