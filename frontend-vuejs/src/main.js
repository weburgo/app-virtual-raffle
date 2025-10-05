import { createApp } from 'vue'
import router from './router';
import './style.css'
import App from './App.vue'
import("preline/dist/index.js");


const app = createApp(App)
app.use(router)
app.mount('#app')