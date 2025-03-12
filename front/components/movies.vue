<template>
    <div class="w-screen grid h-full p-3 px-6 gap-3">
        <p class="text-2xl text-white font-bold">Cartelera</p>
        <div class="grid grid-cols-2 gap-2">
            <movie-box v-for="movie in movies" :key="movie.id" :movie="movie" />
        </div>
    </div>
</template>

<script setup>
import { getPeliculas } from '../services/communicationManager';

const movies = ref([]);

onMounted(async () => {
  const peliculas = await getPeliculas();
  if (peliculas) {
    movies.value = peliculas.filter(movie => movie.status === 'Now playing');
    // movies.value = peliculas;
  }
  console.log(movies);
  
});
</script>