<template>
    <div class="grid gap-5">
        <titlebar />
        <div class="w-full h-full flex flex-col gap-5 pb-17">
            <div class="w-full h-58 flex p-4 bg-black/25 gap-5">
                <div class="w-2/5">
                    <img :src="movieData.image" alt="Logo" class="w-full h-full" />
                </div>
                <div class="w-3/5 flex flex-col justify-center gap-3 overflow-hidden">
                    <p class="text-2xl font-bold">{{ movieData.title }} </p>
                    <div>
                        <p class="text-sm inline-block bg-red-600 rounded-full px-2 py-1">{{ movieData.category }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full p-4 grid gap-5">
                <p class="text-xl font-bold">Trailer</p>
                <iframe width="100%" height="100%" :src="movieData.trailer" frameborder="1"></iframe>
            </div>
            <div class="w-full p-4 grid gap-3">
                <div>
                    <p class="text-xl font-bold">Sinopsis</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, quia. Natus, quia. Natus, quia.</p>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <p class="text-xl font-bold">Duración</p>
                        <p>2h 30min</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Clasificación</p>
                        <p>12+</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Director</p>
                        <p>Pepe Perez</p>
                    </div>
                </div>
                <div>
                    <p class="text-xl font-bold">Actores</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, quia. Natus, quia. Natus, quia.</p>
                </div>
                <div>
                    <p class="text-xl font-bold">Productores</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, quia. Natus, quia. Natus, quia.</p>
                </div>
            </div>
            <div class="w-full p-4 grid gap-3">
                <form class="grid gap-3">
                    <select name="salas" id="salas">
                        <option value="Barcelona" selected>Barcelona</option>
                        <option value="sala1">---</option>
                        <option value="sala2">---</option>
                        <option value="sala3">---</option>
                    </select>
                    <select name="salas" id="salas">
                        <option value="" disabled selected hidden>Dia</option>
                        <option value="sala1">---</option>
                        <option value="sala2">---</option>
                        <option value="sala3">---</option>
                    </select>
                </form>
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