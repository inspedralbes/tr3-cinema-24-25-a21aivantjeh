<template>
  <div class="flex justify-between items-center bg-gray-700/50 border-b border-gray-700 w-full p-1">
    <img src="../../assets/images/logoInstituto.png" alt="TaquillaXpress" class="size-10 p-1 bg-white rounded-full" />
    <p class="text-xl font-bold text-white">TaquillaXpress</p>
  </div>
  <div class="min-h-screen bg-gray-900 text-white p-6 relative">
    <NuxtLink to="javascript:history.back()"
      class="group absolute items-center top-2 w-12 hover:w-28 right-2 bg-white text-black rounded-full px-4 py-2 transition-all duration-300 z-10 overflow-hidden">
      <div class="flex items-center">
        <img src="../../assets/images/back-icon.svg" alt="Back"
          class="w-6 h-6 mr-2 transition-transform duration-300 group-hover:scale-110">
        <p class="text-lg font-semibold opacity-0 group-hover:opacity-100 text-black transition-all duration-300">
          Atrás
        </p>
      </div>
    </NuxtLink>
    <div class="relative rounded-3xl overflow-hidden mb-8 shadow-2xl">
      <div class="relative h-64 md:h-96 w-full">
        <div class="absolute inset-1 bg-cover bg-center"
          :style="{ backgroundImage: `url(${movieData.backdrop || movieData.poster})` }"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
      </div>

      <div class="relative z-10 -mt-32 px-6 pb-6 flex flex-col md:flex-row items-start md:items-end gap-6">
        <!-- Poster -->
        <div
          class="w-32 md:w-48 flex-shrink-0 rounded-xl overflow-hidden shadow-lg border-4 border-gray-800 transform translate-y-0 md:-translate-y-12">
          <img :src="movieData.poster" :alt="movieData.title" class="w-full h-auto" />
        </div>

        <div class="flex-1">
          <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ movieData.title }}</h1>
          <div class="flex flex-wrap gap-3 mb-3">
            <p v-if="movieData.year" class="bg-gray-800 px-3 py-1 rounded-full text-sm">{{ movieData.year }}</p>
            <p v-if="movieData.duration" class="bg-gray-800 px-3 py-1 rounded-full text-sm">{{ movieData.duration }}
              mins</p>
            <p v-if="movieData.rating" class="bg-yellow-600 px-3 py-1 rounded-full text-sm flex items-center gap-1">
              <span>★</span>
              {{ movieData.rating }}
            </p>
          </div>

          <p v-if="movieData.description" class="text-gray-300 mb-4 line-clamp-3 md:line-clamp-none">
            {{ movieData.description }}
          </p>
        </div>
      </div>
    </div>

    <div class="max-w-3xl mx-auto">
      <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-gray-700">
        <h2 class="text-2xl font-bold mb-6 flex items-center">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
          Selecciona un horario
        </h2>

        <div class="space-y-4">
          <div class="flex overflow-x-auto px-2 py-3 gap-2">
            <button v-for="date in showtimes" :key="date" @click="seleccionarDia(date)"
              class="px-6 py-3 rounded-xl transition-all duration-200 flex-shrink-0 focus:ring focus:ring-blue-400"
              :class="[
                selectedDay === date
                  ? 'bg-blue-600 text-white'
                  : 'bg-gray-700 hover:bg-gray-600 text-white'
              ]">
              {{ date.date }}
            </button>
          </div>

          <div v-if="selectedDay" class="text-center text-sm text-blue-300">
            Día seleccionado: {{ selectedDay.date }}
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mt-6">
            <button v-for="hora in selectedDay.showtimes" :key="hora" @click="seleccionarHora(hora)" class="relative"
              :class="selectedTime === hora ? 'ring-2 ring-blue-400' : ''">
              <div class="bg-gray-700 px-4 py-4 rounded-xl flex flex-col items-center transition-all duration-200"
                :class="selectedTime === hora ? 'bg-blue-600' : 'hover:bg-gray-600'">
                <span class="text-lg font-bold">{{ hora.time }}</span>
              </div>
            </button>
          </div>

          <div v-if="selectedDay && selectedTime" class="mt-6 bg-blue-900/30 p-4 rounded-xl">
            <h3 class="font-bold mb-2">Tu selección:</h3>
            <div>
              <p class="text-blue-300">{{ movieData.title }}</p>
              <p>{{ selectedDay.date }} a las {{ selectedTime.time }}h</p>
            </div>
            <!-- <p>
              <span class="text-blue-300">{{ movieData.title }}</span> -
              {{ selectedDay.date }} a las {{ selectedTime.time }}
            </p> -->
          </div>

          <div class="mt-6 flex justify-center">
            <button @click="continuarSeleccion"
              class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-xl font-bold transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
              :disabled="!selectedDay || !selectedTime">
              Continuar a selección de asientos
            </button>
          </div>
        </div>
      </div>

      <div class="mt-6 text-center text-gray-400 text-sm">
        <p>La selección de asientos estará disponible en el siguiente paso</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const route = useRoute();
const router = useRouter();

const movieDetalles = JSON.parse(decodeURIComponent(route.query.data || '{}'));
const movieData = movieDetalles.movie;

const showtimes = movieDetalles.showing_dates;;

const selectedDay = ref('');
const selectedTime = ref('');

const seleccionarDia = (dia) => {
  selectedDay.value = dia;
  console.log(selectedDay.value)
};

function showShowtimes() {
  console.log('Showtimes', showtimes)
}

const seleccionarHora = (hora) => {
  selectedTime.value = hora;
};

const continuarSeleccion = () => {
  if (selectedDay.value && selectedTime.value) {
    router.push({
      path: "./select-seats",
      query: {
        data: encodeURIComponent(JSON.stringify({
          ...movieData,
          dia: selectedDay.value,
          hora: selectedTime.value
        }))
      }
    });
  }
};

showShowtimes();
</script>