<template>
    <div class="w-full h-screen flex flex-col">
        <div class="px-4 py-8">
            <h1 class="text-3xl font-bold">Profile</h1>
            <p class="text-lg">This is the profile page</p>
        </div>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="logout">Logout</button>
    </div>
    <navbar />
</template>

<script setup>
import { useAuthStore } from '~/store/authStore';

const authStore = useAuthStore();

const logout = () => {
    authStore.logout();
    navigateTo('/');
}
</script>