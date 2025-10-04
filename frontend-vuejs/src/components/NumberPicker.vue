<script setup>
import { computed } from 'vue'

const props = defineProps({
  max: { type: Number, default: 200 },            // até quantos números
  modelValue: { type: Array, default: () => [] }, // selecionados (v-model)
  sold: { type: Array, default: () => [] },       // números indisponíveis
  multi: { type: Boolean, default: true }         // permite múltipla seleção
})

const emit = defineEmits(['update:modelValue', 'select'])

const selectedSet = computed(() => new Set(props.modelValue))
const soldSet = computed(() => new Set(props.sold))

const isSelected = n => selectedSet.value.has(n)
const isSold = n => soldSet.value.has(n)

function toggle(n) {
  if (isSold(n)) return
  let next = []

  if (props.multi) {
    next = isSelected(n)
      ? props.modelValue.filter(v => v !== n)
      : [...props.modelValue, n]
  } else {
    next = isSelected(n) ? [] : [n]
  }

  emit('update:modelValue', next)
  emit('select', { number: n, selected: !isSelected(n) })
}
</script>

<template>
  <div class="space-y-3">
    <!-- header -->
    <div class="flex items-center justify-between">
      <h2 class="text-base font-semibold text-slate-800">Escolha seus números</h2>
      <div class="text-sm text-slate-500">
        <span class="inline-flex items-center gap-1">
          <span class="size-3 rounded bg-white ring-1 ring-slate-200"></span> Livre
        </span>
        <span class="mx-2">•</span>
        <span class="inline-flex items-center gap-1">
          <span class="size-3 rounded bg-green-600 "></span> Selecionado
        </span>
        <span class="mx-2">•</span>
        <span class="inline-flex items-center gap-1">
          <span class="size-3 rounded bg-slate-300"></span> Indisponível
        </span>
      </div>
    </div>

    <!-- grid de botões 1..max -->
    <div
      class="grid gap-2
             grid-cols-5
             sm:grid-cols-8
             md:grid-cols-10
             lg:grid-cols-12
             xl:grid-cols-14">
      <button
        v-for="n in max"
        :key="n"
        type="button"
        :disabled="isSold(n)"
        :aria-pressed="isSelected(n) ? 'true' : 'false'"
        @click="toggle(n)"
        class="hs-tooltip-toggle group relative isolate
               inline-flex items-center justify-center
               rounded-md px-0 py-2 text-sm font-medium
               ring-1 ring-inset
               transition-all select-none focus:outline-none
               focus-visible:ring-2 focus-visible:ring-indigo-500/60"
        :class="[
          isSold(n)
            ? 'bg-slate-200 text-slate-500 ring-transparent cursor-not-allowed'
            : isSelected(n)
              ? 'bg-green-600 text-white ring-green-500 shadow-sm'
              : 'bg-white text-slate-700 ring-slate-200 hover:bg-slate-50 active:bg-slate-100'
        ]"
      >
        {{ n }}
        <!-- micro realce Preline (tooltip simples) -->
        <span
          class="hs-tooltip-content absolute z-10 -top-8 translate-y-1 opacity-0
                 group-hover:opacity-100 group-hover:-translate-y-0
                 pointer-events-none py-1 px-2 rounded text-xs
                 text-white bg-slate-900/90 shadow
                 transition-[opacity,transform]"
          role="tooltip"
        >
          Número {{ n }}
        </span>
      </button>
    </div>

    <!-- rodapé -->
    <div class="pt-2 text-end text-sm text-slate-600">
      Selecionados:
      <span class="font-semibold">{{ modelValue.join(', ') || 'nenhum' }}</span>
    </div>
  </div>
</template>
