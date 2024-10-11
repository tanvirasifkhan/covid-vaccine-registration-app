<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'

    onMounted(() => document.title = 'Home Page')
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-6/12 bg-white my-20 rounded-xl py-20">
            <div class="flex flex-col space-y-10 items-center">
                <h3 class="font-roboto text-xl text-gray-700 text-center uppercase">Welcome To Our</h3>
                <h4 class="font-roboto text-xl text-gray-700 text-center capitalize">Covid 19 Vaccination Program</h4>
                <RouterLink :to="{ name: 'registration' }" class="font-roboto text-white bg-emerald-500 p-3 block w-4/12 text-center rounded-2xl">Register for Getting Vaccinated</RouterLink>
            </div>
        </div>
    </AppLayout>
</template>