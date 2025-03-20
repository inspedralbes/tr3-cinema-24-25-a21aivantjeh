<template>
    <div>
        <p>tengo cuenta</p>
    </div>
</template>

<script setup>
const route = useRoute();
const movieData = JSON.parse(decodeURIComponent(route.query.data || '{}'));

console.table('MovieData:', movieData);
</script>