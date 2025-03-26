<template>
    <nav class="w-full bg-black text-white p-2 py-3 shadow-t transition-all ease-in-out duration-300 fixed bottom-0 ">
        <ul class="flex justify-around items-center">
            <li> 
                <NuxtLink to="/">
                    <img src="../assets/images/inicio.svg" alt="Inici"
                        class="size-5 hover:scale-110 transition-transform duration-300" />
                </NuxtLink>
            </li>
            <li>
                <img src="../assets/images/logoInstituto.png" alt="Preferides"
                    class="size-8 bg-white rounded-full p-1" />
            </li>
            <li>
                <NuxtLink :to="profileRoute">
                    <img src="../assets/images/perfil.svg" alt="Perfil"
                        class="size-5 hover:scale-110 transition-transform duration-300" />
                </NuxtLink>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { useAuthStore } from '../store/authStore';

const authStore = useAuthStore();

const profileRoute = computed(() => authStore.user ? '/profile' : '/user/register');
</script>