<template>
    <div class="h-65 bg-gray-800/50 border border-gray-700 relative rounded-xl p-2" @click="goToMovieDetails()">
        <div class="h-full flex bg-cover bg-center relative rounded-md "
            :style="{ backgroundImage: `url(${movieDetails.poster})` }">
            <div class="w-full py-2 inline-block bg-gray-800/90 text-white absolute bottom-0">
                <p class="text-xl font-bold overflow-ellipsis overflow-hidden whitespace-nowrap w-full">{{ movieDetails.title
                    }}</p>
                <button class="text-xs inline-block bg-amber-500 rounded-full px-2 py-1">Mes
                    informacións</button>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    movie: {
        type: Object,
        required: true,
    },
});

const movieDetails = props.movie.movie;

const router = useRouter();

function goToMovieDetails() {
    router.push({
        path: '/informacion/:id',
        query: { data: encodeURIComponent(JSON.stringify(props.movie)) }
    });
};
</script>

<style>

</style>