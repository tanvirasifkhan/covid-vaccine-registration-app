<script setup lang="ts">

    import type { CandidateModel } from '@/models/CandidateModel'
    import { computed } from 'vue'

    defineEmits(['onDialogClose'])

    const props = defineProps<{ candidate: CandidateModel, isVisible: boolean }>()

    const getStatus = computed(() => {
        switch(props.candidate.status){
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
    <div v-if="props.isVisible" class="fixed inset-0 items-center justify-center max-h-full bg-gray-400 bg-opacity-70">
        <div class="relative bg-white w-4/12 mx-auto my-36 rounded border border-gray-200">
            <h2 class="font-roboto px-4 py-3 text-gray-600 uppercase border-b border-gray-200">Candidate Information</h2>
            <div class="flex-col space-y-2 p-5">
                <h3 class="font-roboto text-gray-600">Name : {{ props.candidate.name }}</h3>
                <h3 class="font-roboto text-gray-600">Email Address : {{ props.candidate.email }}</h3>
                <h3 class="font-roboto text-gray-600">Phone : {{ props.candidate.phone }}</h3>
                <h3 class="font-roboto text-gray-600">NID : {{ props.candidate.nid }}</h3>
                <h3 class="font-roboto text-gray-600">Center : {{ props.candidate.center?.name }}</h3>
                <h3 class="font-roboto text-gray-600">Status : {{ getStatus }}</h3>
                <h3 class="font-roboto text-gray-600" v-if="props.candidate?.scheduled_at !== null">Scheduled At : {{ props.candidate.scheduled_at?.human }}</h3>
            </div>
            <div class="flex items-center justify-center space-x-3 p-4">
                <button @click="$emit('onDialogClose')" class="px-3 py-2 bg-green-600 text-white rounded-2xl font-roboto">Close Information Dialog</button>
            </div>
        </div>
    </div>
</template>