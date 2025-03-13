<template>
    <div class="w-screen grid h-full p-3 px-6 gap-3">
        <p class="text-2xl text-white font-bold">Cartelera</p>
        <div class="w-full h-32 bg-gray-800 rounded-lg flex items-center justify-center" v-if="movies.length === 0">
            <p class="text-gray-500/50">No hay nada en la cartelera hoy</p>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <movie-box v-for="movie in movies" :key="movie.id" :movie="movie" />
        </div>
    </div>
</template>

<script setup>
import { getShowingMovies } from '../services/communicationManager';

const movies = ref([]);

onMounted(async () => {
  const peliculas = await getShowingMovies();
  if (peliculas) {
    // movies.value = peliculas.filter(movie => movie.status === 'Showing');
    movies.value = peliculas;
  }
  console.log(movies);
  
});
</script>