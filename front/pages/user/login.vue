<template>
    <titlebar />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="max-w-md w-full mx-4 bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar sesión</h1>

            <p v-if="errorMessage" class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                {{ errorMessage }}
            </p>

            <form @submit.prevent="loginForm" class="space-y-4 text-black">
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input v-model="email" type="email" id="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="juan@ejemplo.com" required>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input v-model="password" type="password" id="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="••••••••" required>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-200 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Iniciar sesión
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center text-sm">
                <span class="text-gray-600">¿No tienes cuenta?</span>
                <NuxtLink to="/user/register" class="ml-1 text-blue-600 hover:text-blue-800 font-medium">
                    Regístrate
                </NuxtLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { loginUser } from '../../services/communicationManager'
import { useAuthStore } from '~/store/authStore';

const email = ref('')
const password = ref('')

const errorMessage = ref('')

async function loginForm() {
    try {
        const userData = {
            email: email.value,
            password: password.value
        }
        console.log('Enviando formulario de login', userData);

        const response = await loginUser(userData);

        if (response) {
            const authStore = useAuthStore();
            authStore.login(response.user, response.user.token);
            navigateTo('/profile');
        }

    } catch (error) {
        errorMessage.value = error.message;
        console.log('Error al enviar el formulario', error);
    }
}
</script>