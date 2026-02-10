<template>
  <aside class="bg-white dark:bg-[#152a1c] rounded-xl p-6 border border-[#cfe7d7] dark:border-[#2a4a35] sticky top-24 h-fit">
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-lg font-bold">Filtros</h3>
      <button 
        @click="clearFilters" 
        class="text-sm text-primary hover:underline font-medium"
      >
        Limpiar
      </button>
    </div>

    <!-- Filtro de Certificación Energética -->
    <div class="mb-6 pb-6 border-b border-[#e7f3eb] dark:border-[#1a3022]">
      <h4 class="font-bold mb-3 text-sm uppercase tracking-wide text-[#4c9a66] dark:text-[#a0ccb0]">
        Certificación Energética
      </h4>
      <div class="space-y-2">
        <label 
          v-for="cert in certifications" 
          :key="cert"
          class="flex items-center gap-2 cursor-pointer hover:text-primary transition-colors"
        >
          <input 
            type="checkbox" 
            :value="cert"
            v-model="selectedCertifications"
            class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary"
          />
          <span class="text-sm">Calificación {{ cert }}</span>
        </label>
      </div>
    </div>

    <!-- Filtro de Tipo de Energía -->
    <div class="mb-6 pb-6 border-b border-[#e7f3eb] dark:border-[#1a3022]">
      <h4 class="font-bold mb-3 text-sm uppercase tracking-wide text-[#4c9a66] dark:text-[#a0ccb0]">
        Tipo de Energía
      </h4>
      <div class="space-y-2">
        <label 
          v-for="type in energyTypes" 
          :key="type"
          class="flex items-center gap-2 cursor-pointer hover:text-primary transition-colors"
        >
          <input 
            type="checkbox" 
            :value="type"
            v-model="selectedEnergyTypes"
            class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary"
          />
          <span class="text-sm">{{ type }}</span>
        </label>
      </div>
    </div>

    <!-- Filtro de Materiales de Construcción -->
    <div>
      <h4 class="font-bold mb-3 text-sm uppercase tracking-wide text-[#4c9a66] dark:text-[#a0ccb0]">
        Materiales de Construcción
      </h4>
      <div class="space-y-2">
        <label 
          v-for="material in materials" 
          :key="material"
          class="flex items-center gap-2 cursor-pointer hover:text-primary transition-colors"
        >
          <input 
            type="checkbox" 
            :value="material"
            v-model="selectedMaterials"
            class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary"
          />
          <span class="text-sm">{{ material }}</span>
        </label>
      </div>
    </div>
  </aside>
</template>

<script setup>
import { ref, watch } from 'vue'

const certifications = ['A', 'B', 'C', 'D', 'E', 'F', 'G']
const energyTypes = ['Aerotermia', 'Solar', 'Biomasa']
const materials = ['Madera', 'Hormigón ecológico', 'Ladrillo reciclado']

const selectedCertifications = ref([])
const selectedEnergyTypes = ref([])
const selectedMaterials = ref([])

const emit = defineEmits(['filterChange'])

const clearFilters = () => {
  selectedCertifications.value = []
  selectedEnergyTypes.value = []
  selectedMaterials.value = []
}

watch(
  [selectedCertifications, selectedEnergyTypes, selectedMaterials],
  () => {
    emit('filterChange', {
      certifications: selectedCertifications.value,
      energyTypes: selectedEnergyTypes.value,
      materials: selectedMaterials.value
    })
  },
  { deep: true }
)
</script>
