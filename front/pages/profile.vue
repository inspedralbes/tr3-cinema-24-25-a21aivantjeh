<template>
    <div class="min-h-screen bg-gray-50">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl font-bold text-gray-800">Mi Perfil</h1>
                    </div>
                    <div>
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out"
                            @click="logout">
                            Cerrar Sesión
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                <div class="px-4 py-5 sm:px-6 flex items-center">
                    <div class="h-16 w-16 rounded-full bg-gray-200 mr-4 flex items-center justify-center">
                        <span class="text-2xl text-gray-500">👤</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ authStore.user?.name || 'Usuario' }}</h2>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ authStore.user?.email }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Mis Entradas</h3>
                        <p class="mt-1 text-sm text-gray-500">Entradas compradas</p>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <ul class="divide-y divide-gray-200">
                            <li v-for="(entrada) in misEntradas" :key="entrada.id" class="py-4">
                                <p class="text-xs text-gray-300 text-end">{{ entrada.showtime.created_at }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-gray-900">
                                        <h4 class="text-sm font-medium">{{ entrada.showtime.movie.title }}</h4>
                                        <p class="text-xs text-gray-500">{{ entrada.showtime.show_date }} | {{
                                            entrada.showtime.show_time }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500">Fila:{{ entrada.fila }} - Col:{{
                                        entrada.columna }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-10 flex justify-center items-center">
                    <a href="https://mail.google.com/mail/u/0/#search/from%3Aa21aivantjeh.inspedralbes.cat"
                        target="_blank">
                        <p
                            class=" text-blue-600 font-medium border-b border-blue-600 cursor-pointer">
                            Ver entradas de TaquillaXpress
                </p>
                    </a>
                </div>
            </div>
        </main>
    </div>
    <navbar />
</template>

<script setup>
import { useAuthStore } from '~/store/authStore';
import { getEntradas } from '../services/communicationManager';
import { ref } from 'vue';

const authStore = useAuthStore();
// const entradas = ref([]);
const misEntradas = ref([]);

onMounted(async () => {
    const entradas = await getEntradas(authStore.user?.email);
    if (entradas) {
        misEntradas.value = entradas;
    }
    console.log("Mis entradas", misEntradas.value);
});

const logout = () => {
    authStore.logout();
    navigateTo('/');
};
</script>