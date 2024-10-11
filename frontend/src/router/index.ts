import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router"
import HomePage from "@/pages/HomePage.vue"

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: HomePage,
        name: 'home'
    },
    {
        path: '/vaccine-candidate',
        children: [
            {
                path: 'registration',
                component: ()=> import('@/pages/RegisterVaccineCandidate.vue'),
                name: 'registration'
            },
            {
                path: 'search',
                component: ()=> import('@/pages/SearchVaccineCandidate.vue'),
                name: 'search'
            }
        ]
    },
    {
        path: '/auth/login',
        component: ()=> import('@/pages/AdminLogin.vue'),
        name: 'admin-login'
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})



export default router