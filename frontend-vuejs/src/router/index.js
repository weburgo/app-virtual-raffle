import { createRouter, createWebHistory } from 'vue-router';
import NumeroSelecionar from '../pages/NumeroSelecionar.vue';


const routes = [
  { path: '/numeros', component: NumeroSelecionar },
//   { path: '/about', component: AboutView },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})
export default router;