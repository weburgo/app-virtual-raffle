<template>
  <Navbar />
  <main class="min-h-screen bg-slate-200 p-4 sm:p-8">

    <div class="mx-auto max-w-6xl">

      <NumeroSelecionar v-model="chosen" :sold="sold" :max="200" :multi="true" />
      <div class="flex justify-end mt-6">
        <button type="button" class="inline-flex items-center gap-2 rounded-md bg-sky-600 px-4 py-2 text-white
                 shadow-sm hover:bg-sky-700 focus:outline-none focus-visible:ring-2
                 focus-visible:ring-sky-500/60" @click="console.log('comprar', chosen)">
          Realizar pagamento
        </button>
      </div>
    </div>
  </main>
</template>


<script setup>
import { ref } from 'vue'

import Navbar from './components/layout/Navbar.vue'
import NumeroSelecionar from './pages/NumeroSelecionar.vue'

// exemplo: alguns números já vendidos/indisponíveis
const sold = [7, 13, 25, 50, 77, 120, 199]
const chosen = ref([]) // v-model
</script>
