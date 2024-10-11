<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'

    onMounted(() => document.title = 'Admin Login')
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-4/12 mt-20">
            <div class="bg-white rounded-xl">
                <h2 class="text-gray-700 font-roboto text-xl text-center p-3 border-b border-gray-100">Admin Login</h2>
                <form class="p-8 space-y-3">
                    <div class="flex flex-col space-y-2">
                        <label for="email" class="font-roboto text-gray-600 cursor-pointer">Email address</label>
                        <input type="email" id="email" placeholder="Email address" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <!-- <p class="text-red-600 font-roboto text-sm">Error Message</p> -->
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="password" class="font-roboto text-gray-600 cursor-pointer">Password</label>
                        <input type="password" id="password" placeholder="Password" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <!-- <p class="text-red-600 font-roboto text-sm">Error Message</p> -->
                    </div>
                    <div class="flex flex-col space-y-2 items-end justify-end">
                        <button type="submit" class="font-roboto text-white bg-emerald-500 p-3 block w-4/12 text-center rounded-2xl">Log into the system</button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>