<template>
    <div class="flex items-center">
        <nav>
            <ul class="flex space-x-3">
                <li><RouterLink :to="{  }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Dashboard</RouterLink></li>
                <li><RouterLink :to="{  }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Candidates</RouterLink></li>
                <li><RouterLink :to="{  }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Scheduled Candidates</RouterLink></li>
                <li><RouterLink :to="{  }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Vaccinated Candidates</RouterLink></li>
                <li><RouterLink :to="{ name: 'search' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Search NID</RouterLink></li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center space-x-3">
        <h3>Tanvir Ahmed Khan</h3>
        <RouterLink :to="{ name: 'admin-login' }" class="font-roboto text-white bg-red-500 px-3 py-2 rounded-2xl">Logout</RouterLink>
    </div>    
</template>