<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted, ref } from 'vue'
    import { useAuthStore } from '@/store/authStore'
    import { useCandidateStore } from '@/store/candidateStore'
    import { useRouter } from 'vue-router'
    import CandidateInfoModal from '@/components/CandidateInfoModal.vue'
    import ScheduleCandidateModal from '@/components/ScheduleCandidateModal.vue'

    onMounted(() => document.title = 'Registered Candidates')

    const authStore = useAuthStore()
    const router = useRouter()
    const candidateStore = useCandidateStore()

    const isVisibleInfoModal = ref<boolean>(false)

    onMounted(() => {
        if(!authStore.isAuthenticated()){
            router.push({ name: 'admin-login' })
        }
    })
    
    onMounted(() => candidateStore.statusWiseCandidateList('registered'))

    const fetchCandidate = async (id: number) => {
        await candidateStore.fetchCandidateInfo(id)
        isVisibleInfoModal.value = true
    }  
    
    const fetchAfterSchedule = async () => {
        await candidateStore.statusWiseCandidateList('registered')
        isVisibleInfoModal.value = false
    }

    
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-10/12 rounded-xl py-20">
            <div class="bg-white rounded">
                <h2 class="font-roboto text-gray-600 border-b border-gray-100 px-4 py-3 uppercase">Registered Candidate List</h2>
                <div class="flex items-center justify-center" v-if="candidateStore.isFetching">
                    <h2 class="font-roboto text-lg text-gray-500 p-5">Fetching Candidats from server</h2>
                </div>
                <div class="flex items-center justify-center" v-else-if="candidateStore.candidates.length === 0">
                    <h2 class="font-roboto text-lg text-gray-500 p-5">No Data Found</h2>
                </div>
                <table v-else class="w-full">
                    <thead class="bg-slate-50 border-b border-gray-100">
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Name</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Center</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Email Address</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Phone</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">NID</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Status</th>
                        <th class="text-left font-roboto px-4 py-2 text-gray-600">Actions</th>
                    </thead>
                    <tbody>
                        <tr v-for="(candidate, index) in candidateStore.candidates" :key="candidate.id" :class="index % 2 !== 0 ? 'bg-slate-50' : ''">
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">{{ candidate.name }}</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">{{ candidate.center?.name }}</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">{{ candidate.email }}</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">{{ candidate.phone }}</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">{{ candidate.nid }}</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">
                                <span class="px-3 py-1 bg-sky-100 border border-sky-200 text-sky-700 rounded-2xl font-roboto">Registered</span>
                            </td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap flex items-center space-x-2">
                                <button @click="fetchCandidate(candidate.id)" class="bg-emerald-600 text-white px-3 py-1 rounded-2xl">Schedule</button>
                                <button @click="fetchCandidate(candidate.id)" class="bg-indigo-600 text-white px-3 py-1 rounded-2xl">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>    
            <CandidateInfoModal :candidate="candidateStore.candidate" @on-dialog-close="isVisibleInfoModal = !isVisibleInfoModal" :is-visible="isVisibleInfoModal" />
            <ScheduleCandidateModal :candidate="candidateStore.candidate" 
                @on-schedule-confirmation="fetchAfterSchedule"
                @on-schedule-dialog-close="isVisibleInfoModal = !isVisibleInfoModal" 
                :is-open="isVisibleInfoModal" />
        </div>
    </AppLayout>
</template>