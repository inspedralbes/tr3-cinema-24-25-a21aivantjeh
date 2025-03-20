<template>
    <div>
        <p>Register</p>
        <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>
        <form @submit.prevent="registerForm">
            <div>
                <label for="">Nombre completo</label>
                <input v-model="name" type="text" id="name" class="border border-gray-500 rounded">
            </div>
            <div>
                <label for="">Correu</label>
                <input v-model="email" type="email" id="email" class="border border-gray-500 rounded">
            </div>
            <div>
                <label for="">Contraseña</label>
                <input v-model="password" type="password" id="pass" class="border border-gray-500 rounded">
            </div>
            <button type="submit" class="bg-blue-500 ">Crear usuario</button>
        </form>
        <NuxtLink to="/user/login">Login</NuxtLink>
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