import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router"
import HomePage from "@/pages/HomePage.vue"

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: HomePage,
        name: 'home'
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})



export default router