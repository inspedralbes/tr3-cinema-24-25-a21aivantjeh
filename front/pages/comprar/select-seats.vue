<template>
    <div class="min-h-screen bg-gray-900 text-white p-4 md:p-6">
        <!-- Movie Info Bar -->
        <div class="bg-gray-800/60 backdrop-blur-sm rounded-xl p-4 mb-6 flex items-center justify-between">
            <div class="flex items-center gap-4 w-full">
                <div class="w-12 h-16 md:w-16 md:h-20 rounded-md">
                    <img :src="movieData.poster" :alt="movieData.title" class="w-full h-full object-cover" />
                </div>
                <div class="flex w-full gap-2">
                    <div>
                        <h3 class="font-bold text-lg md:text-xl">{{ movieData.title }}</h3>
                        <p class="text-sm text-gray-300">{{ movieData.dia }} · {{ movieData.hora }}</p>
                    </div>
                    <div class="">
                        <span class="px-3 py-1 bg-blue-600 rounded-full text-sm">Sala 1</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <h2 class="text-2xl font-bold text-center">Selecciona tus asientos</h2>
    
            <div class="flex justify-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-sm bg-green-500"></div>
                    <span class="text-sm">Disponible</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-sm bg-blue-500"></div>
                    <span class="text-sm">Seleccionado</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-sm bg-red-500"></div>
                    <span class="text-sm">Ocupado</span>
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <div class="h-6 bg-gray-600/30 rounded-t-full mx-auto w-4/5"></div>
                <div class="text-center text-sm text-gray-400">PANTALLA</div>
                <div
                    class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-1/2 h-12 bg-blue-500/10 blur-xl rounded-full">
                </div>
            </div>
            <div class="max-w-3xl mx-auto mt-6 mb-8">
                <div
                    class="grid grid-cols-8 md:grid-cols-10 gap-2 p-5 bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700">
                    <button v-for="asiento in asientos" :key="asiento.id" :class="[
                        'w-8 h-8 md:w-10 md:h-10 rounded-md flex items-center justify-center transition-all text-sm',
                        asiento.reservado ? 'bg-red-500 cursor-not-allowed opacity-70' :
                            asientosSeleccionados.includes(asiento.id) ? 'bg-blue-500 ring-2 ring-blue-300' : 'bg-green-500 hover:bg-green-600'
                    ]" :disabled="asiento.reservado" @click="toggleAsiento(asiento)">
                        {{ asiento.numero }}
                    </button>
                </div>
            </div>
        </div>


        <!-- Selected Seats Summary -->
        <div class="max-w-3xl mx-auto">
            <div v-if="asientosSeleccionados.length > 0"
                class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-5 mb-6 border border-gray-700">
                <h3 class="font-bold text-lg mb-3">Asientos Seleccionados</h3>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span v-for="id in asientosSeleccionados" :key="id"
                        class="px-3 py-1 bg-blue-600 rounded-md text-sm flex items-center gap-1">
                        Asiento {{ id }}
                        <button @click="removeAsiento(id)"
                            class="text-xs bg-blue-800 rounded-full w-4 h-4 flex items-center justify-center">×</button>
                    </span>
                </div>

                <div class="flex justify-between items-center border-t border-gray-700 pt-4">
                    <div>
                        <p class="text-gray-300">Precio por asiento</p>
                        <p class="text-lg font-bold">€9,00</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-300">Total</p>
                        <p class="text-lg font-bold">${{ (asientosSeleccionados.length * 9).toFixed(2) }} EUR</p>
                    </div>
                </div>
            </div>

            <button v-if="asientosSeleccionados.length > 0" @click="confirmarAsientos"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-colors">
                Continuar al pago ({{ asientosSeleccionados.length }} asiento{{ asientosSeleccionados.length > 1 ? 's' :
                '' }})
            </button>

            <p v-else class="text-center text-gray-400 mt-6">
                Selecciona al menos un asiento para continuar
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
const route = useRoute();
const router = useRouter();

// Parse movie data from route
const movieData = JSON.parse(decodeURIComponent(route.query.data || '{}'));

// Create seating layout
const asientos = ref([...Array(40)].map((_, i) => ({
    id: i + 1,
    numero: i + 1,
    reservado: Math.random() > 0.7 // Simulate some seats being already reserved
})));

// Track selected seats
const asientosSeleccionados = ref([]);

// Toggle seat selection
const toggleAsiento = (asiento) => {
    if (!asiento.reservado) {
        if (asientosSeleccionados.value.includes(asiento.id)) {
            asientosSeleccionados.value = asientosSeleccionados.value.filter(id => id !== asiento.id);
        } else {
            asientosSeleccionados.value.push(asiento.id);
        }
    }
};

// Remove a seat from selection
const removeAsiento = (id) => {
    asientosSeleccionados.value = asientosSeleccionados.value.filter(asientoId => asientoId !== id);
};

// Proceed to payment
const confirmarAsientos = () => {
    router.push({
        path: "/pago",
        query: {
            data: encodeURIComponent(JSON.stringify({
                ...movieData,
                asientos: asientosSeleccionados.value
            }))
        }
    });
};
</script>