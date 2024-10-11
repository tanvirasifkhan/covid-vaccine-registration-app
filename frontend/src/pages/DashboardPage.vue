<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'
    import { useAuthStore } from '@/store/authStore'
    import { useRouter } from 'vue-router'

    onMounted(() => document.title = 'Dashboard Page')

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
        <div class="mx-auto w-6/12 bg-white my-20 rounded-xl py-20">
            <div class="flex flex-col space-y-10 items-center">
                <h3 class="font-roboto text-xl text-gray-700 text-center uppercase">Welcome Back</h3>
                <h4 class="font-roboto text-xl text-gray-700 text-center capitalize">{{ authStore.getUser().name }}</h4>                
            </div>
        </div>
    </AppLayout>
</template>