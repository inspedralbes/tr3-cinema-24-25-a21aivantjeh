<template>
    <div class="min-h-screen bg-gray-900 text-white p-4 md:p-6">
        <div class="bg-gray-800/60 backdrop-blur-sm rounded-xl p-4 mb-6 flex items-center justify-between">
            <div class="flex items-center gap-4 w-full">
                <div class="w-12 h-16 rounded-md">
                    <img :src="movieData.poster" :alt="movieData.title" class="w-full h-full object-cover" />
                </div>
                <div class="flex w-full justify-between gap-2">
                    <div class="w-[70%]">
                        <h3 class="font-bold text-lg">{{ movieData.title }}</h3>
                        <p class="text-sm text-gray-300">{{ movieData.dia.date }} · {{ movieData.hora.time }}</p>
                    </div>
                    <div>
                        <p class="px-3 py-1 bg-blue-600 rounded-full text-sm">Sala 1</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <h2 class="text-2xl font-bold text-center">Selecciona tus asientos</h2>
            <div class="flex justify-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-sm bg-gray-500"></div>
                    <span class="text-sm">Disponible</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-sm bg-green-400"></div>
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
                    class="grid grid-cols-10 gap-2 p-5 bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700">
                    <button v-for="asiento in asientos" :key="asiento.id" :class="[
                        'size-7 rounded-md flex items-center justify-center transition-all text-sm',
                        asiento.reservado ? 'seat-reserved cursor-not-allowed opacity-70' :
                            asientosSeleccionados.includes(asiento) ? 'seat-selected ring-2' : 'seat-available hover:ring-2'
                    ]" :disabled="asiento.reservado" @click="toggleAsiento(asiento)">
                        {{ asiento.columna }}
                    </button>
                </div>
            </div>
        </div>


        <div class="max-w-3xl mx-auto">
            <div v-if="asientosSeleccionados.length > 0"
                class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-5 mb-6 border border-gray-700">
                <h3 class="font-bold text-lg mb-3">Asientos Seleccionados
                    <span class="text-sm text-gray-400">(Fila - Columna)</span>
                </h3>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span v-for="asiento in asientosSeleccionados" :key="asiento.id"
                        class="px-3 py-1 bg-blue-600 rounded-md text-sm flex items-center gap-1">
                        Fila: {{ asiento.fila }} Col: {{ asiento.columna }}
                        <button @click="removeAsiento(asiento)"
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

            <p v-else class="text-center text-gray-400">
                Selecciona al menos un asiento para continuar
            </p>
            <div class="flex justify-center text-blue-900 hover:text-red-500 hover:underline"
                @click="confirmarCancelacion()">
                <p>Cancelar</p>
            </div>
        </div>
    </div>
</template>

<style>
.seat-reserved {
    background-color: #fb2c36;
}

.seat-available {
    background-color: #6a7282;
}

.seat-available:hover {
    background-color: #2b2b2b;
}

.seat-selected {
    background-color: #05d472;
}
</style>

<script setup>
import { ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useAuthStore } from '~/store/authStore';

const route = useRoute();
const router = useRouter();

const movieData = JSON.parse(decodeURIComponent(route.query.data || '{}'));

const filas = 12;
const columnas = 10;
const maxSeats = 10;

const asientos = ref([]);

for (let fila = 1; fila <= filas; fila++) {
    for (let columna = 1; columna <= columnas; columna++) {
        asientos.value.push({
            id: (fila - 1) * 10 + columna,
            fila: fila,
            columna: columna,
            reservado: Math.random() > 0.7
        });
    }
}

const asientosSeleccionados = ref([]);

const toggleAsiento = (asiento) => {
    const index = asientosSeleccionados.value.findIndex(a => a.id === asiento.id);
    if (index !== -1) {
        asientosSeleccionados.value.splice(index, 1);
    } else {
        if (asientosSeleccionados.value.length < maxSeats) {
            asientosSeleccionados.value.push(asiento);
        } else {
            alert("No puedes seleccionar más de 10 asientos");
        }
    }
};

const removeAsiento = (asiento) => {
    const index = asientosSeleccionados.value.findIndex(a => a.id === asiento.id);
    if (index !== -1) {
        asientosSeleccionados.value.splice(index, 1);
    }
};

const confirmarAsientos = () => {
    const authStore = useAuthStore();
    const usuarioAutenticado = authStore?.user || JSON.parse(localStorage.getItem("user"));
    const asientosFiltrados = asientosSeleccionados.value.map(({ reservado, ...asiento }) => asiento);

    const movieDataWithSeats = {
        ...movieData,
        asientos: asientosFiltrados
    };

    const encodedData = encodeURIComponent(JSON.stringify(movieDataWithSeats));
    // console.log("MovieData:", movieDataWithSeats);

    if (!usuarioAutenticado) {
        // Navega a una pagina sin necesidad de autenticacion
        navigateTo({
            path: "/comprar/tickets-noacc",
            query: {
                data: encodedData
            }
        });
    } else {
        navigateTo({
            path: "/comprar/tickets",
            query: {
                data: encodedData
            }
        });
    }
};

const confirmarCancelacion = () => {
    if (confirm("¿Estás seguro de que quieres cancelar?")) {
        console.log("Acción cancelada");
        router.push('/');
    }
};
</script>