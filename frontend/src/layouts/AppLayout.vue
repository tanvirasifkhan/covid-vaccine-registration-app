<script setup lang="ts">
    import AppHeader from '@/components/AppHeader.vue'
    import AuthenticatedAppHeader from '@/components/AuthenticatedAppHeader.vue'
</script>

<template>
    <header class="flex items-center justify-between bg-white px-20 py-4 shadow-sm">
        <h2 class="font-roboto capitalize text-gray-700 text-xl">Covid Vaccine Registration</h2>
        <AuthenticatedAppHeader />
    </header>
    <slot />
</template>