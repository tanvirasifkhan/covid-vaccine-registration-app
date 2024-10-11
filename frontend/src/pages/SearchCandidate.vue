<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'
    import { useAuthStore } from '@/store/authStore'
    import { useRouter } from 'vue-router'

    onMounted(() => document.title = 'Search Candidates')

    const authStore = useAuthStore()
    const router = useRouter()

    onMounted(() => {
        if(!authStore.isAuthenticated()){
            router.push({ name: 'admin-login' })
        }
    })
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-4/12 mt-20">
            <div class="bg-white rounded-xl">
                <h2 class="font-roboto text-gray-600 border-b border-gray-100 px-4 py-3 uppercase">Search Candidate by NID</h2>
                <form class="p-8">
                    <div class="flex space-x-2 items-center justify-between w-full">
                        <input type="text" placeholder="Enter NID" autocomplete="off" class="w-10/12 focus: outline-none font-roboto focus:shadow-sm rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <button type="submit" class="w-2/12  font-roboto text-white bg-emerald-500 px-3 py-2 text-center rounded-2xl">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>