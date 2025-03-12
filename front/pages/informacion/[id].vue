<template>
    <div class="grid gap-5">
        <div class="flex justify-between items-center bg-gray-700/50 border-b border-gray-700 w-full p-1">
            <NuxtLink to="/">
                <img src="../../assets/images/logoInstituto.png" alt="TaquillaXpress"
                    class="size-13 p-1 bg-white rounded-full" />
            </NuxtLink>
            <p class="text-xl font-bold text-white">TaquillaXpress</p>
        </div>
        <div class="w-full h-full flex flex-col gap-5 pb-17">
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
                    <div v-else
                        class="grid justify-center items-center text-center gap-1 text-white/50 bg-gray-700 p-8">
                        <p>No hay trailer disponible, pero puedes buscarlo en YouTube:</p>

                        <!-- Buscar en YouTube en proceso -->
                        <a :href="'https://www.youtube.com/results?search_query=' + movieData.title.replace(/\s+/g, '+') + '+trailer'"
                            target="_blank"
                            class="text-blue-400 hover:underline flex items-center justify-center gap-2">
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
        </div>
    </div>
    <!-- <comprar[id] /> -->
    <comprar[id] :movieData="movieData" />
</template>

<script setup>
const route = useRoute();

const movieData = JSON.parse(decodeURIComponent(route.query.data));
console.log(movieData);
</script>