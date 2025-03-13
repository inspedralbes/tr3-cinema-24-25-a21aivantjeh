<template>
    <div class="fixed bottom-0 bg-orange-500 w-full flex p-2 justify-center items-center border-2 border-white">
        <button type="button" class="text-xl font-bold" @click="comprarEntradas()">
            Comprar entrades
        </button>
    </div>
</template>

<script setup>
const route = useRoute();
const movieDetalles = JSON.parse(decodeURIComponent(route.query.data));

const router = useRouter();
function comprarEntradas() {
    console.log('Comprando entradas: ', movieDetalles.movie.id);
    router.push({
        path: '/comprar/:id',
        query: { data: encodeURIComponent(JSON.stringify(movieDetalles)) }
    });
    console.log('MovieData:', movieDetalles);
}

</script>