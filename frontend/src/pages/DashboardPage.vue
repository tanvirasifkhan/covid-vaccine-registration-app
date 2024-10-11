<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'

    onMounted(() => document.title = 'Dashboard Page')
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-6/12 bg-white my-20 rounded-xl py-20">
            <div class="flex flex-col space-y-10 items-center">
                <h3 class="font-roboto text-xl text-gray-700 text-center uppercase">Welcome Back</h3>
                <h4 class="font-roboto text-xl text-gray-700 text-center capitalize">Md. Tanvir Ahmed Khan</h4>                
            </div>
        </div>
    </AppLayout>
</template>