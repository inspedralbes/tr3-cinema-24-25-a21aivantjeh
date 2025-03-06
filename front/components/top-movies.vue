<template>
    <div class="w-full h-[28rem] flex flex-col">
        <div class="w-full h-3/4 flex bg-blue-500 bg-cover bg-center relative"
            :style="{ backgroundImage: `url(${movies[0].image})` }">
            <!-- <img src="../assets/images/logo.svg" alt="Logo" class="size-10" /> -->
            <p class="px-4 w-full text-5xl font-bold text-white absolute bottom-[-.6rem] break-words">{{
                movies[0].title}}</p>
        </div>
        <div class="px-4 py-8">
            <div
                class="border-2 border-double border-orange-500 hover:bg-orange-500 text-orange-500 hover:text-white inline-block p-2 rounded-br-2xl rounded-tl-2xl transition-all ease-in-out duration-300 cursor-pointer" @click="comprarEntradas(movies[0])">
                <button type="button" class="text-xl font-bold">
                    Comprar entrades
                </button>
            </div>
            <div>
                <!-- Slider de películas -->
            </div>
        </div>
    </div>
</template>

<script setup>
import { navigateTo } from '#app';

const movies = [
    {
        id: 0,
        title: 'The Amazing Spiderman',
        image: '/images/movie-poster.jpg',
        category: 'Acción',
        trailer: 'https://www.youtube.com/embed/8jAfBd3g6bA',
    }];

function comprarEntradas(movie) {
    const movieData = encodeURIComponent(JSON.stringify(movie));
    navigateTo(`/informacion/${movie.id}?data=${movieData}`);
}
</script>