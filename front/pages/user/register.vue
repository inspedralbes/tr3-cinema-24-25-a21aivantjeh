<template>
    <titlebar />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="max-w-md w-full mx-4 bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear cuenta</h1>

            <p v-if="errorMessage" class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                {{ errorMessage }}
            </p>

            <form @submit.prevent="registerForm" class="space-y-4 text-black">
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                    <input v-model="name" type="text" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Juan" required>
                </div>

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
                        Crear usuario
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center text-sm">
                <span class="text-gray-600">¿Ya tienes cuenta?</span>
                <NuxtLink to="/user/login" class="ml-1 text-blue-600 hover:text-blue-800 font-medium">
                    Iniciar sesión
                </NuxtLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { registerUser } from '../../services/communicationManager';

const name = ref('');
const email = ref('');
const password = ref('');

const errorMessage = ref('');

async function registerForm() {
    try {
        const userData = {
            name: name.value,
            email: email.value,
            password: password.value
        };

        console.log('Enviando formulario de registro', userData);
        const response = await registerUser(userData);

        console.log('Respuesta del servidor:', response);
        navigateTo('/profile');
    } catch (error) {
        errorMessage.value = error.message || 'Hubo un problema al registrar el usuario';
        console.log('Error al enviar el formulario de registro', error);
    }
}
</script>