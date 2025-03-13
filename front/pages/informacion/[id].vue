<template>
    <div class="flex justify-between items-center bg-gray-700/50 border-b border-gray-700 w-full p-1 mb-5">
        <img src="../../assets/images/logoInstituto.png" alt="TaquillaXpress"
            class="size-10 p-1 bg-white rounded-full" />
        <p class="text-xl font-bold text-white">TaquillaXpress</p>
    </div>
    <NuxtLink to="javascript:history.back()"
        class="group absolute items-center top-14 w-12 hover:w-28 right-2 bg-white text-black rounded-full px-4 py-2 transition-all duration-300 z-10 overflow-hidden">
        <div class="flex items-center">
            <img src="../../assets/images/back-icon.svg" alt="Back"
                class="w-6 h-6 mr-2 transition-transform duration-300 group-hover:scale-110">
            <p class="text-lg font-semibold opacity-0 group-hover:opacity-100 text-black transition-all duration-300">
                Atrás
            </p>
        </div>
    </NuxtLink>
    <div class="w-full h-full flex flex-col gap-5 pb-17 relative">
        <div class="w-full h-58 flex p-3 py-8 gap-5">
            <!-- Imagen -->
            <div class="w-2/5 flex items-center">
                <img :src="movieData.poster" alt="Logo" class="w-full h-auto rounded-lg shadow-lg">
            </div>

            <!-- Información -->
            <div class="w-3/5 flex flex-col justify-center overflow-hidden gap-1.5">
                <div class="flex gap-2 items-center">
                    <p class="text-xs">{{ movieData.rating }}</p>
                    <div class="flex gap-1">
                        <img src="../../assets/images/estrella.svg" alt="" srcset="" class="w-4 h-4">
                        <img src="../../assets/images/estrella.svg" alt="" srcset="" class="w-4 h-4">
                        <img src="../../assets/images/estrella.svg" alt="" srcset="" class="w-4 h-4">
                    </div>
                </div>
                <p class="text-2xl font-bold text-white break-words line-clamp-2 ">
                    {{ movieData.title }}
                </p>
                <div class="flex flex-wrap gap-2 pt-3">
                    <!-- Clasificación -->
                    <p class="text-sm bg-red-600 text-white font-semibold rounded-full px-3 py-1">
                        {{ movieData.rated }}
                    </p>

                    <!-- Géneros -->
                    <p v-for="g in movieData.genre.split(', ')" :key="g"
                        class="text-sm bg-amber-500 text-black font-semibold rounded-full px-3 py-1">
                        {{ g }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full p-4 grid gap-5 rounded-lg">
            <div class="w-full p-4 grid gap-2 bg-gray-800/50 border border-gray-700 rounded-xl">
                <p class="text-xl font-bold">Trailer</p>
                <div v-if="movieData.trailer">
                    <iframe width="100%" height="100%" :src="movieData.trailer" frameborder="1"
                        class="bg-gray-500"></iframe>
                </div>
                <div v-else class="grid justify-center items-center text-center gap-1 text-white/50 bg-gray-700 p-8">
                    <p>No hay trailer disponible, pero puedes buscarlo en YouTube:</p>

                    <!-- Buscar en YouTube en proceso -->
                    <a :href="'https://www.youtube.com/results?search_query=' + movieData.title.replace(/\s+/g, '+') + '+trailer'"
                        target="_blank" class="text-blue-400 hover:underline flex items-center justify-center gap-2">
                        Buscar en YouTube
                        <img src="../../assets/images/youtube-logo.svg" alt="YouTube Logo" class="w-6 h-6">
                    </a>
                </div>
            </div>
            <div class="w-full p-4 grid gap-3 bg-gray-800/50 border border-gray-700 rounded-lg">
                <div>
                    <p class="text-xl font-bold">Sinopsis</p>
                    <p> {{ movieData.description }} </p>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <p class="text-xl font-bold">Duración</p>
                        <p>{{ movieData.duration }} mins</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Dia de estreno</p>
                        <p>{{ movieData.release_date }}</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Director</p>
                        <p> {{ movieData.director }}</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Lenguaje</p>
                        <p>{{ movieData.language }}</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Pais</p>
                        <p>{{ movieData.country }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-xl font-bold">Actores</p>
                    <p>{{ movieData.cast }}</p>
                </div>
                <div>
                    <p class="text-xl font-bold">Escritores</p>
                    <p>{{ movieData.writer }}</p>
                </div>
            </div>
        </div>
        <div v-if="!movieDetalles.showing_dates"
            class="bg-gray-800/95 border-2 border-gray-700 p-4 fixed w-full bottom-0">
            <p class="text-center text-gray-500 text-xl font-bold">Proxímamente</p>
        </div>
    </div>

    <!-- <comprar[id] /> -->
    <comprar[id] :movieDetalles="movieDetalles" v-if="movieDetalles.showing_dates" />
</template>

<script setup>
const route = useRoute();

const movieDetalles = JSON.parse(decodeURIComponent(route.query.data));
const movieData = movieDetalles.movie;

onMounted(async () => {
    console.log('Hola', movieDetalles);
})
</script>