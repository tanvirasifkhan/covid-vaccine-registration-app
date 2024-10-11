<script setup lang="ts">
    import { useAuthStore } from '@/store/authStore'
    import { useRouter } from 'vue-router'

    const authStore = useAuthStore()
    const router = useRouter()

    const logout = async () => {
        await authStore.signOut()
        router.push({ name: 'admin-login' })
    }
</script>

<template>
    <div class="flex items-center">
        <nav>
            <ul class="flex space-x-3">
                <li><RouterLink :to="{ name: 'dashboard' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Dashboard</RouterLink></li>
                <li><RouterLink :to="{ name: 'registered_candidates' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Registered</RouterLink></li>
                <li><RouterLink :to="{ name: 'scheduled_candidates' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Scheduled</RouterLink></li>
                <li><RouterLink :to="{ name: 'vaccinated_candidates' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Vaccinated</RouterLink></li>
                <li><RouterLink :to="{ name: 'search_candidates' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Search NID</RouterLink></li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center space-x-3">
        <h3>{{ authStore.getUser()?.name }}</h3>
        <button @click.prevent="logout" class="font-roboto text-white bg-red-500 px-3 py-2 rounded-2xl">Logout</button>
    </div>    
</template>