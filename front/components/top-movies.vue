<template>
    <div class="relative w-screen h-96">
        <Swiper class="w-full h-full shadow-xl overflow-hidden" :slides-per-view="1" :loop="true" :effect="'fade'"
            :fade="{ crossFade: true }" :autoplay="{ delay: 5000, disableOnInteraction: false }"
            :breakpoints="{
            '640': { slidesPerView: 1 },
            '768': { slidesPerView: 1 },
            '1024': { slidesPerView: 1 }
            }">
            <SwiperSlide v-for="movie in movies" :key="movie.movie.id" class="relative" @click="comprarEntradas(movie)">
                <div class="h-full w-full bg-cover bg-center" :style="{ backgroundImage: `url(${movie.movie.poster})` }">
                    <div class="absolute inset-[-1px] bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                </div>

                <div class="absolute bottom-0 left-0 w-full p-6 z-20">
                    <h2 class="text-4xl font-bold text-white mb-2">{{ movie.movie.title }}</h2>
                    <p v-if="movie.movie.year" class="text-xl text-gray-200">{{ movie.movie.year }}</p>
                    <div v-if="movie.movie.rating" class="flex items-center mt-2">
                        <span class="text-yellow-400 mr-1">★</span>
                        <span class="text-white">{{ movie.movie.rating }} / 10</span>
                    </div>
                    <button v-if="movie.movie.trailer"
                        class="mt-4 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition-colors"
                        @click="openTrailer(movie.movie.trailerUrl)">
                        Watch Trailer
                    </button>
                </div>
            </SwiperSlide>
        </Swiper>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { getShowingMovies } from '../services/communicationManager';

const movies = ref([]);

onMounted(async () => {
    try {
        const peliculas = await getShowingMovies();
        if (peliculas) {
            movies.value = peliculas.filter(movie => parseFloat(movie.movie.rating) > 7);
            // console.info(movies)
        }
    } catch (error) {
        console.error("Error cargando películas", error);
    }
});

const router = useRouter();

function comprarEntradas(movie) {
    router.push({
        path: `/informacion/${movie.id}`,
        query: { data: encodeURIComponent(JSON.stringify(movie)) }
    });
}
</script>
