<template>
    <div class="min-h-screen flex justify-center items-center p-4">
        <div class="max-w-md w-full bg-gradient-to-r from-gray-800/80 to-gray-900/80 backdrop-blur-md rounded-xl border border-gray-700 shadow-2xl overflow-hidden">
            <div class="bg-gray-800/60 p-6 flex items-center justify-center space-x-2 border-b border-gray-700">
                <img src="../../assets/images/ticket.svg" alt="TaquillaXpress" class="size-8">
                <h1 class="text-3xl font-bold text-white">Compra de Tickets</h1>
            </div>
            
            <div v-if="movieData?.title" class="p-6 border-gray-700 flex items-center" :style="{ backgroundImage: `url(${movieData.poster})`, backgroundPosition: 'center', backgroundSize: 'cover' }">
                <div class="flex items-center bg-black/70 w-full border border-gray-600 p-3 rounded-lg">
                    <div class="h-12 w-12 flex-shrink-0 bg-gray-700 border border-gray-600 rounded-full flex items-center justify-center text-white">
                        <img src="../../assets/images/clapboard.svg" alt="TaquillaXpress" class="size-7">
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-bold text-gray-100">{{ movieData.title }}</h2>
                        <div class="flex mt-1 space-x-4 text-gray-200">
                            <span v-if="movieData.dia?.date" class="flex items-center">
                                <img src="../../assets/images/calendar.svg" alt="TaquillaXpress" class="size-3 mr-1">
                                {{ movieData.dia.date }}
                            </span>
                            <span v-if="movieData.hora?.time" class="flex items-center">
                                <img src="../../assets/images/clock.svg" alt="TaquillaXpress" class="size-3 mr-1">
                                {{ movieData.hora.time }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-800/60 text-white border-b border-gray-700">
                <h2 class="text-xl font-bold mb-4 flex items-center">
                    <img src="../../assets/images/seat.svg" alt="TaquillaXpress" class="size-7 mr-2">
                    Asientos Seleccionados
                </h2>
                <div class="grid grid-cols-2 gap-3 items-center">
                    <div v-for="asiento in movieData.asientos" :key="asiento.id" class="bg-gray-900/80 border border-gray-700 rounded-xl p-3 flex justify-center">
                        <p class="font-semibold text-xs flex items-center">Fila: {{ asiento.fila }} Col: {{ asiento.columna }}</p>
                    </div>
                </div>
            </div>
            
            <div class="p-6 bg-gray-800/30 backdrop-blur-md">
                <form @submit.prevent="ticketForm" class="space-y-5">
                    <div class="space-y-2">
                        <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre Completo</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input 
                                id="nombre"
                                v-model="name" 
                                placeholder="Ingresa tu nombre" 
                                class="pl-10 border border-gray-600 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-gray-400 bg-gray-800/60   text-white" 
                                required
                            />
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="correo" class="block text-sm font-medium text-gray-200">Correo Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input 
                                id="correo"
                                v-model="email" 
                                type="email" 
                                placeholder="Ingresa tu correo" 
                                class="pl-10 border border-gray-600 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-gray-400 bg-gray-800/60   text-white" 
                                required
                            />
                        </div>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-green-700 text-white font-bold py-3 px-4 rounded-lg flex items-center justify-center shadow-lg border border-green-600"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Confirmar Compra
                    </button>
                </form>
            </div>
            
            <div class="p-4 bg-gray-900/80 text-gray-300 text-center text-sm border-t border-gray-700 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                TaquillaXpress 2025
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import { comprarTicket } from "../../services/communicationManager";

const route = useRoute();
const movieData = ref(JSON.parse(decodeURIComponent(route.query.data || '{}')));

const name = ref('');
const email = ref('');

async function ticketForm() {
    const data = {
        name: name.value,
        email: email.value,
        movieData: movieData.value
    }
    console.log('Compra confirmada:', { 
        name: nombre.value, 
        email: correo.value, 
        movieData: movieData.value 
    });

    const response = await comprarTicket(data);
    
    
    const successElement = document.createElement('div');
    successElement.className = 'fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50';
    successElement.innerHTML = `
        <div class="bg-gray-800/90 backdrop-blur-md p-6 rounded-lg shadow-xl border border-gray-700 transform transition-all animate-bounce duration-1000">
            <div class="text-green-400 flex justify-center mb-4">
                <img src="/check.svg" alt="TaquillaXpress" class="size-10">
            </div>
            <h3 class="text-xl font-bold text-center text-gray-100">¡Compra realizada con éxito!</h3>
            <p class="text-gray-300 text-center mt-2">Recibirás los detalles en tu correo</p>
        </div>
    `;
    document.body.appendChild(successElement);
    
    setTimeout(() => {
        document.body.removeChild(successElement);
        navigateTo('/');
    }, 3000);
}
</script>