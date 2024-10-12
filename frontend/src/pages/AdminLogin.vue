<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted, ref, type Ref } from 'vue'
    import { useAuthStore } from '@/store/authStore'
    import { useToast } from 'vue-toast-notification'
    import type { LoginUserModel } from '@/models/LoginUserModel'
    import { useRouter } from 'vue-router'

    const authStore = useAuthStore()
    const router = useRouter()
    const $toast = useToast()

    const user: Ref<LoginUserModel> = ref({} as LoginUserModel)

    const adminLogin = async () => {
        await authStore.signIn(user.value)
        if(Object.keys(authStore.errors).length === 0) {
            user.value = {} as LoginUserModel
            router.push({ name: 'dashboard' })
            if(authStore.successMessage) {
                $toast.success(authStore.successMessage)
            } 
            if(authStore.errorMessage){
                $toast.error(authStore.errorMessage)
            }
        }   
    }

    onMounted(() => document.title = 'Admin Login')

    onMounted(() => {
        if(authStore.isAuthenticated()){
            router.push({ name: 'dashboard' })
        }
    })
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-4/12 mt-20">
            <div class="bg-white rounded-xl">
                <h2 class="text-gray-700 font-roboto text-xl text-center p-3 border-b border-gray-100">Admin Login</h2>                
                <!-- <div class="bg-red-50 text-red-600 rounded p-3 m-3" v-if="authStore.errorMessage">{{ authStore.errorMessage }}</div> -->
                <form @submit.prevent="adminLogin" class="p-8 space-y-3">
                    <div class="flex flex-col space-y-2">
                        <label for="email" class="font-roboto text-gray-600 cursor-pointer">Email address</label>
                        <input type="email" id="email" v-model="user.email" placeholder="Email address" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="authStore.errors?.email">{{ authStore.errors?.email.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="password" class="font-roboto text-gray-600 cursor-pointer">Password</label>
                        <input type="password" id="password" v-model="user.password" placeholder="Password" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="authStore.errors?.password">{{ authStore.errors?.password.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 items-end justify-end">
                        <button type="submit" class="font-roboto text-white bg-emerald-500 p-3 block w-4/12 text-center rounded-2xl">Log into the system</button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>