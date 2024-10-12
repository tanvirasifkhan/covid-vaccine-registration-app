import '@/assets/css/tailwind.css'

import { createApp } from 'vue'
import App from './App.vue'
import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'
import { createPinia } from 'pinia'
import router from './router'

const app = createApp(App)

app.use(ToastPlugin).use(createPinia()).use(router).mount('#app')
