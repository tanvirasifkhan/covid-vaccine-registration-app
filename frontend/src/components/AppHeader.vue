<template>
    <div class="flex items-center">
        <nav>
            <ul class="flex space-x-3">
                <li><RouterLink :to="{ name: 'search' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Search</RouterLink></li>
                <li><RouterLink :to="{ name: 'registration' }" exact-active-class="text-emerald-600" class="hover:text-emerald-600 font-roboto text-gray-700">Register for Vaccine</RouterLink></li>
            </ul>
        </nav>
    </div>    
    <div class="flex items-center space-x-3">
        <RouterLink :to="{ name: 'admin-login' }" class="font-roboto text-white bg-emerald-500 px-3 py-2 rounded-2xl">Admin Login</RouterLink>
    </div>      
</template>