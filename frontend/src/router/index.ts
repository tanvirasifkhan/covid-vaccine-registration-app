import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router"
import HomePage from "@/pages/HomePage.vue"
import { useAuthStore } from "@/store/authStore"

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
    },
    {
        path: '/dashboard',
        component: ()=> import('@/pages/DashboardPage.vue'),
        name: 'dashboard',
        meta: {
            requiredAuth: true
        }
    },
    {
        path: '/candidates',
        meta: {
            requiredAuth: true
        },
        children: [
            {
                path: 'registered',
                component: ()=> import('@/pages/RegisteredCandidates.vue'),
                name: 'registered_candidates'
            },
            {
                path: 'scheduled',
                component: ()=> import('@/pages/ScheduledCandidates.vue'),
                name: 'scheduled_candidates'
            },
            {
                path: 'vaccinated',
                component: ()=> import('@/pages/VaccinatedCandidates.vue'),
                name: 'vaccinated_candidates'
            },
            {
                path: 'search',
                component: ()=> import('@/pages/SearchCandidate.vue'),
                name: 'search_candidates'
            }
        ]        
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

router.beforeEach((to, from, next) => {

    const authStore = useAuthStore()

    if(to.meta.requiredAuth && !authStore.isAuthenticated()){
        next({ name: 'admin-login' })
    }else{
        next()
    }
})

export default router