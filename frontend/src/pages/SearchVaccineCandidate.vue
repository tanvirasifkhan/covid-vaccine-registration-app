<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { computed, onMounted, ref } from 'vue'
    import { useCandidateStore } from '@/store/candidateStore'

    onMounted(() => document.title = 'Scheduled Candidates')

    const candidateStore = useCandidateStore()

    const searchKeyword = ref<string>('')
    const isSearched = ref<boolean>(false)
    const searchError = ref<string>('')


    const search = async () => {
        if(searchKeyword.value === ''){
            searchError.value = "Enter NID"
        }else {
            await candidateStore.searchCandidates(searchKeyword.value)
            isSearched.value = true
            searchError.value = ''
        }        
    }

    const getStatus = computed(() => {
        switch(candidateStore.candidate?.status){
            case 'registered':
                return 'Registered'
            case 'scheduled':
                return 'Scheduled'
            case 'vaccinated':
                return 'Vaccinated'
            default:
                return 'Registered'
        }
    })

</script>

<template>
    <AppLayout>
        <div class="mx-auto w-4/12 mt-20 space-y-5">
            <div class="bg-white rounded-xl">
                <h2 class="text-gray-700 font-roboto text-xl text-center p-3 border-b border-gray-100">Search Candidate by NID</h2>
                <form @submit.prevent="search" class="p-8">
                    <div class="flex space-x-2 items-center justify-between w-full">
                        <input type="text" v-model="searchKeyword" placeholder="Enter NID" autocomplete="off" class="w-10/12 focus: outline-none font-roboto focus:shadow-sm rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <button type="submit" class="w-2/12  font-roboto text-white bg-emerald-500 px-3 py-2 text-center rounded-2xl">Search</button>
                    </div>
                    <p class="text-red-600 font-roboto text-sm" v-if="searchError">{{ searchError }}</p>
                </form>
            </div>
            <div v-if="isSearched" class="bg-white rounded-xl">
                <h2 class="text-gray-700 font-roboto text-xl text-center p-3 border-b border-gray-100">Search Result by NID</h2>
                <div class="p-8">
                    <h1 v-if="Object.keys(candidateStore.candidate).length === 0" class="font-roboto text-red-600 text-lg text-center">{{ candidateStore.errorMessage }}</h1>
                    <div v-else class="flex-col space-y-2">
                        <h3 class="font-roboto text-gray-600">Name : {{ candidateStore.candidate?.name }}</h3>
                        <h3 class="font-roboto text-gray-600">Email Address : {{ candidateStore.candidate?.email }}</h3>
                        <h3 class="font-roboto text-gray-600">Phone : {{ candidateStore.candidate?.phone }}</h3>
                        <h3 class="font-roboto text-gray-600">NID : {{ candidateStore.candidate?.nid }}</h3>
                        <h3 class="font-roboto text-gray-600">Center : {{ candidateStore.candidate?.center?.name }}</h3>
                        <h3 class="font-roboto text-gray-600">Status : {{ getStatus }}</h3>
                        <h3 class="font-roboto text-gray-600" v-if="candidateStore.candidate?.scheduled_at !== null">Scheduled At : {{ candidateStore.candidate?.scheduled_at?.human }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>