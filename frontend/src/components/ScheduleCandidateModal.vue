<script setup lang="ts">

    import type { CandidateModel } from '@/models/CandidateModel'
    import { useCandidateStore } from '@/store/candidateStore'
    import { ref } from 'vue'

    const emit = defineEmits(['onScheduleDialogClose', 'onScheduleConfirmation'])

    defineProps<{ candidate: CandidateModel, isOpen: boolean }>()

    const candidateStore = useCandidateStore()

    const data = ref<{ scheduled_at: string }>({} as { scheduled_at: string })

    const confirmSchedule = async (id: number, data: any) => {
        await candidateStore.assignSchedule(id, data)
        if(Object.keys(candidateStore.errors).length === 0 && candidateStore.errorMessage === '') {
            emit('onScheduleConfirmation')
        }        
    }


</script>

<template>
    <div v-if="isOpen" class="fixed inset-0 items-center justify-center max-h-full bg-gray-400 bg-opacity-70">
        <div class="relative bg-white w-4/12 mx-auto my-36 rounded border border-gray-200">
            <h2 class="font-roboto px-4 py-3 text-gray-600 uppercase border-b border-gray-200">Candidate Scheduling Dialog</h2>
            <div class="flex-col space-y-2 p-5 m-5 bg-slate-50 rounded-md">
                <h3 class="font-roboto text-gray-600">Name : {{ candidate.name }}</h3>
                <h3 class="font-roboto text-gray-600">Center : {{ candidate.center?.name }}</h3>
                <h3 class="font-roboto text-gray-600">Status : Registered</h3>
            </div>
            <div class="flex items-center justify-center space-x-3 p-4">
                <form class="flex flex-col space-y-5 w-full">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col space-y-2">
                            <label for="scheduleDate" class="font-roboto text-gray-600 cursor-pointer">Schedule Date</label>
                            <input type="date" v-model="data.scheduled_at" class="focus: outline-none font-roboto rounded-xl text-gray-600 px-4 py-2 border border-gray-100" placeholder="Choose schedule date">
                        </div>
                        <p class="text-red-600 font-roboto text-sm" v-if="candidateStore.errors?.scheduled_at">{{ candidateStore.errors?.scheduled_at.toString() }}</p>
                        <p class="text-red-600 font-roboto text-sm" v-else-if="candidateStore.errorMessage">{{ candidateStore.errorMessage }}</p>
                    </div>
                    <div class="flex justify-end items-center space-x-3">
                        <button @click="$emit('onScheduleDialogClose')" class="px-3 py-2 bg-red-600 text-white rounded-2xl font-roboto">Cancel</button>
                        <button @click.prevent="confirmSchedule(candidate.id, data.scheduled_at)" type="submit" class="px-3 py-2 bg-green-600 text-white rounded-2xl font-roboto">Confirm Schedule</button>
                    </div>                    
                </form>                
            </div>
        </div>
    </div>
</template>