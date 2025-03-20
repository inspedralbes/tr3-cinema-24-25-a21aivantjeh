<template>
    <div>
        <p>Login</p>
        <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>
        <form @submit.prevent="loginForm">
            <div>
                <label for="">Correu</label>
                <input v-model="email" type="email" name="" id="email" class="border border-gray-500 rounded">
            </div>
            <div>
                <label for="">Contrasenya</label>
                <input v-model="password" type="password" name="" id="password" class="border border-gray-500 rounded">
            </div>
            <button type="submit" class="bg-blue-500">Login</button>
        </form>
        <NuxtLink to="/user/register">Register</NuxtLink>
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