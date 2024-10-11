<script setup lang="ts">
    import AppHeader from '@/components/AppHeader.vue'
</script>

<template>
    <header class="flex items-center justify-between bg-white px-20 py-4 shadow-sm">
        <RouterLink :to="{ name: 'home' }" class="font-roboto capitalize text-gray-700 text-xl">Covid Vaccine Registration</RouterLink>
        <AppHeader />
    </header>
    <slot />
</template>