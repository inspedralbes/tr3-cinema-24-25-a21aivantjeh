<template>
    <div class="relative flex-shrink-0 w-48 h-64 bg-gray-800/50 border border-gray-700 rounded-xl p-2 shadow-lg overflow-hidden" @click="goToMovieDetails()">
        <div class="h-full w-full object-cover flex bg-cover bg-center relative rounded-md"
            :style="{ backgroundImage: `url(${movie.poster})` }">

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="transform -rotate-45 bg-red-500 py-2 text-center absolute w-100 border-y-2">
                    <p class="font-bold text-white text-2xl">Próximamente</p>
                </div>
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

const router = useRouter();

function goToMovieDetails() {
    router.push({
        path: '/informacion/:id',
        query: { data: encodeURIComponent(JSON.stringify(props.movie)) }
    });
};
</script>