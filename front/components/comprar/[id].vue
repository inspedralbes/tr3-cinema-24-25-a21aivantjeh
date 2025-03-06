<template>
    <div class="fixed bottom-0 bg-orange-500 w-full flex p-2 justify-center items-center border-2 border-white">
        <button type="button" class="text-xl font-bold" @click="comprarEntradas()">
            Comprar entrades
        </button>
    </div>
</template>

<script setup>
import { useRoute } from 'vue-router';

const route = useRoute();
const movieID = route.params.id;

const movieData = JSON.parse(decodeURIComponent(route.query.data));

function comprarEntradas() {
    console.log('Comprando entradas: ', movieID);
    navigateTo(`/comprado`);
    console.log('MovieData:', movieData);
}
</script>