<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue'
    import { onMounted } from 'vue'

    onMounted(() => document.title = 'Vaccinated Candidates')
</script>

<template>
    <AppLayout>
        <div class="mx-auto w-10/12 rounded-xl py-20">
            <div class="bg-white rounded">
                <h2 class="font-roboto text-gray-600 border-b border-gray-100 px-4 py-3 uppercase">Vaccinated Candidate List</h2>
                <table class="w-full">
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
                        <tr>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Tanvir Ahmed Khan</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Dhaka, Bangladesh</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">tanvir.ahmed@gmail.com</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">01942654501</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">123456789sadfasdf</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">
                                <span class="px-3 py-1 bg-green-100 border border-green-200 text-green-700 rounded-2xl font-roboto">Vaccinated</span>
                            </td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap flex items-center space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-2xl">Details</button>
                            </td>
                        </tr>
                        <tr class="bg-slate-50">
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Tanvir Ahmed Khan</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Dhaka, Bangladesh</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">tanvir.ahmed@gmail.com</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">01942654501</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">123456789sadfasdf</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">
                                <span class="px-3 py-1 bg-green-100 border border-green-200 text-green-700 rounded-2xl font-roboto">Vaccinated</span>
                            </td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap flex items-center space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-2xl">Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Tanvir Ahmed Khan</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Dhaka, Bangladesh</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">tanvir.ahmed@gmail.com</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">01942654501</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">123456789sadfasdf</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">
                                <span class="px-3 py-1 bg-green-100 border border-green-200 text-green-700 rounded-2xl font-roboto">Vaccinated</span>
                            </td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap flex items-center space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-2xl">Details</button>
                            </td>
                        </tr>
                        <tr class="bg-slate-50">
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Tanvir Ahmed Khan</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">Dhaka, Bangladesh</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">tanvir.ahmed@gmail.com</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">01942654501</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">123456789sadfasdf</td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap">
                                <span class="px-3 py-1 bg-green-100 border border-green-200 text-green-700 rounded-2xl font-roboto">Vaccinated</span>
                            </td>
                            <td class="p-4 font-roboto text-gray-600 whitespace-nowrap flex items-center space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-2xl">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>            
        </div>
    </AppLayout>
</template>