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
    </div>
</template>

<script setup>
import { registerUser } from '../services/communicationManager';
import { useAuthStore } from '~/store/authStore';

const authStore = useAuthStore();

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
        const response = await registerUser(userData, authStore.token);
        console.log('Formulario de registro enviado', response);
    } catch (error) {
        errorMessage.value = error.message || 'Hubo un problema al registrar el usuario';
        console.log('Error al enviar el formulario de registro', error);
    }
}
</script>