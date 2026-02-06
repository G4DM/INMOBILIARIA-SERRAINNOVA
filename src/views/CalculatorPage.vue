<template>
  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 shadow-lg border border-[#cfe7d7] dark:border-[#2a4a35]">
      <div class="text-center mb-8">
        <h1 class="text-3xl md:text-4xl font-black mb-4">Calculadora de Impacto Energético</h1>
        <p class="text-[#4c9a66] dark:text-[#a0ccb0]">Descubre cuánto podrías ahorrar con una vivienda sostenible</p>
      </div>
      
      <!-- Calculator Form -->
      <div class="space-y-6 mb-8">
        <div>
          <label class="block text-sm font-bold mb-2">Tamaño de la Vivienda (m²)</label>
          <input type="number" v-model="homeSize" class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary" placeholder="150"/>
        </div>
        
        <div>
          <label class="block text-sm font-bold mb-2">Consumo Energético Actual (kWh/año)</label>
          <input type="number" v-model="currentConsumption" class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary" placeholder="8000"/>
        </div>
        
        <div>
          <label class="block text-sm font-bold mb-2">Calificación Energética Deseada</label>
          <select v-model="targetRating" class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary">
            <option value="A">Calificación A (Máxima eficiencia)</option>
            <option value="B">Calificación B (Alta eficiencia)</option>
            <option value="C">Calificación C (Eficiencia media)</option>
          </select>
        </div>
        
        <button @click="calculate" class="w-full bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-4 rounded-xl transition-all flex items-center justify-center gap-2">
          <span class="material-symbols-outlined">calculate</span>
          Calcular Impacto
        </button>
      </div>
      
      <!-- Results -->
      <div v-if="showResults" class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-[#e7f3eb] dark:bg-[#1a3022] rounded-xl">
        <div class="text-center">
          <span class="material-symbols-outlined text-primary text-4xl">savings</span>
          <p class="text-sm font-medium mt-2 opacity-80">Ahorro Anual</p>
          <p class="text-3xl font-black text-primary mt-1">{{ savings }}€</p>
        </div>
        <div class="text-center">
          <span class="material-symbols-outlined text-primary text-4xl">eco</span>
          <p class="text-sm font-medium mt-2 opacity-80">CO2 Reducido</p>
          <p class="text-3xl font-black text-primary mt-1">{{ co2Reduction }} kg</p>
        </div>
        <div class="text-center">
          <span class="material-symbols-outlined text-primary text-4xl">trending_down</span>
          <p class="text-sm font-medium mt-2 opacity-80">Reducción Consumo</p>
          <p class="text-3xl font-black text-primary mt-1">{{ consumptionReduction }}%</p>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const homeSize = ref(150)
const currentConsumption = ref(8000)
const targetRating = ref('A')
const showResults = ref(false)
const savings = ref(0)
const co2Reduction = ref(0)
const consumptionReduction = ref(0)

const calculate = () => {
  // Simple calculation logic
  const reductionFactor = targetRating.value === 'A' ? 0.6 : targetRating.value === 'B' ? 0.4 : 0.25
  consumptionReduction.value = Math.round(reductionFactor * 100)
  savings.value = Math.round(currentConsumption.value * reductionFactor * 0.15) // Assuming 0.15€/kWh
  co2Reduction.value = Math.round(currentConsumption.value * reductionFactor * 0.4) // Assuming 0.4kg CO2/kWh
  showResults.value = true
}
</script>
