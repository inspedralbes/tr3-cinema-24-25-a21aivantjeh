<template>
    <div class="grid h-full p-3 px-6 gap-3">
        <p class="text-2xl text-white font-bold">Próximamente</p>

        <div class="flex gap-4 pb-4 overflow-x-auto">
            <coming-soon-box v-for="movie in movies" :key="movie.id" :movie="movie" />
        </div>
    </div>
</template>

<script setup>
import { getPeliculas } from '../services/communicationManager';

const movies = ref([]);

onMounted(async () => {
    const peliculas = await getPeliculas();
    if (peliculas) {
        movies.value = peliculas.filter(movie => movie.status === 'Coming soon');
        // movies.value = peliculas;
    }
    console.log(movies);

});

</script>