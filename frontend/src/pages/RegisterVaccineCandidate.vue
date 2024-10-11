<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted, ref, type Ref } from 'vue'
    import { useCandidateStore } from '@/store/candidateStore'
    import type { CandidateModel } from '@/models/CandidateModel';

    const candidateStore = useCandidateStore()

    onMounted(() => document.title = 'Search Registered Candidates')

    onMounted(async () => await candidateStore.fetchAllCenters())    

    const candidate: Ref<CandidateModel> = ref({} as CandidateModel)

    const register = async () => {
        await candidateStore.registerCandidate(candidate.value)
        if(Object.keys(candidateStore.errors).length === 0) {
            candidate.value = {} as CandidateModel
        }
    }

</script>

<template>
    <AppLayout>
        <div class="mx-auto w-4/12 mt-20">
            <div class="bg-white rounded-xl">
                <h2 class="text-gray-700 font-roboto text-xl text-center p-3 border-b border-gray-100">Vaccine Candidate Reservation</h2>
                <div class="bg-green-50 text-green-600 rounded p-3 m-3" v-if="candidateStore.successMessage">{{ candidateStore.successMessage }}</div>
                <form @submit.prevent="register" class="p-8 space-y-3">
                    <div class="flex flex-col space-y-2">
                        <label for="name" class="font-roboto text-gray-600 cursor-pointer">Name</label>
                        <input type="text" id="name" v-model="candidate.name" placeholder="Name" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.name">{{ candidateStore.errors?.name.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="center" class="font-roboto text-gray-600 cursor-pointer">Vaccine Center</label>
                        <select v-if="candidateStore.isFetching" id="center" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                            <option value="">Fetching centers</option>
                        </select>
                        <select id="center" v-else v-model="candidate.center_id" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                            <option value="">Select a Center</option>
                            <option v-for="center in candidateStore.centers" :key="center.id" :value="center.id">{{ center.name }}</option>
                        </select>
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.center_id">{{ candidateStore.errors?.center_id.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="email" class="font-roboto text-gray-600 cursor-pointer">Email address</label>
                        <input type="email" id="email" v-model="candidate.email" placeholder="Email address" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.email">{{ candidateStore.errors?.email.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="phone" class="font-roboto text-gray-600 cursor-pointer">Phone</label>
                        <input type="text" id="phone" v-model="candidate.phone" placeholder="Phone" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.phone">{{ candidateStore.errors?.phone.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="nid" class="font-roboto text-gray-600 cursor-pointer">NID</label>
                        <input type="text" id="nid" placeholder="NID" v-model="candidate.nid" autocomplete="off" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100">
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.nid">{{ candidateStore.errors?.nid.toString() }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 items-end justify-end">
                        <button type="submit" class="font-roboto text-white bg-emerald-500 p-3 block w-4/12 text-center rounded-2xl">Confirm Reservation</button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>