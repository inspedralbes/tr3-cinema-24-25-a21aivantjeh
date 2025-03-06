<template>
    <div class="w-full h-65 bg-gray-500 relative">
        <div class="w-full h-full flex bg-cover bg-center relative" :style="{ backgroundImage: `url(${movies[0].image})` }">
        </div>
        <div class="w-full inline-block bg-gray-500/50 text-white p-2 absolute bottom-0">
            <p class="text-xl font-bold overflow-ellipsis overflow-hidden whitespace-nowrap w-full">{{ movies[0].title }}</p>
            <p class="text-xs inline-block bg-amber-500 rounded-full px-2 py-1">Mes informacións</p>
        </div>
    </div>
</template>


<script setup>
const movies = [
    {
    id: 0,
    title: 'The Amazing Spiderman',
    image: '/images/movie-poster.jpg',
    },
    {
}];
</script>