<template>
    <div class="grid h-full p-3 px-6 gap-3">
        <p class="text-2xl text-white font-bold border-b-4 border-double border-white">Próximamente</p>

        <div class="flex gap-4 overflow-x-auto bg-gray-800/20 rounded-2xl p-2">
            <coming-soon-box v-for="movie in movies" :key="movie.id" :movie="movie" />
        </div>
    </div>
</template>

<script setup>
import { getUpcomingMovies } from '../services/communicationManager';

const movies = ref([]);

onMounted(async () => {
    const peliculas = await getUpcomingMovies();
    if (peliculas) {
        movies.value = peliculas;
    }
    // console.log(movies);

});

</script>