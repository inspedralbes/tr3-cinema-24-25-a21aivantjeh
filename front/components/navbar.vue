<template>
    <nav class="w-full bg-black text-white p-4 py-5 shadow-t transition-all ease-in-out duration-300 fixed bottom-0 ">
        <ul class="flex justify-around items-center space-x-6">
            <li>
                <!-- <a href="/app"> -->
                <NuxtLink to="/">
                    <img src="../assets/images/inicio.svg" alt="Inici"
                        class="size-5 hover:scale-110 transition-transform duration-300" />
                    <!-- </a> -->
                </NuxtLink>
            </li>
            <li>
                <!-- <a href="/Favorites"> -->
                <NuxtLink to="/favorites">
                    <img src="../assets/images/corazon.svg" alt="Preferides"
                        class="size-5 hover:scale-110 transition-transform duration-300" />
                </NuxtLink>
                <!-- </a> -->
            </li>
            <li>
                <!-- <a href="/Perfil"> -->
                <NuxtLink to="/user/register">
                    <img src="../assets/images/perfil.svg" alt="Perfil"
                        class="size-5 hover:scale-110 transition-transform duration-300" />
                </NuxtLink>
                <!-- </a> -->
            </li>
        </ul>
    </nav>
</template>

<style>
/* .shadow-t {
    box-shadow: 0 -5px 25px 0 rgba(255, 165, 0, 0.3);
} */
</style>