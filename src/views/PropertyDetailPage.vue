<template>
  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div v-if="!property" class="text-center py-12">
      <span class="material-symbols-outlined text-6xl text-[#4c9a66] dark:text-[#a0ccb0] mb-4">home_off</span>
      <p class="text-xl font-bold mb-2">Propiedad no encontrada</p>
      <router-link to="/propiedades" class="text-primary hover:underline">Volver a propiedades</router-link>
    </div>

    <div v-else class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-lg border border-[#cfe7d7] dark:border-[#2a4a35]">
      <!-- Galería de Imágenes -->
      <div class="relative h-96 overflow-hidden">
        <img class="w-full h-full object-cover" :src="property.image" :alt="property.title"/>
        <div class="absolute top-4 left-4 flex gap-2">
          <span 
            :class="getCertificationColor(property.energyCertification)"
            class="text-white px-3 py-1.5 rounded-lg text-sm font-bold uppercase tracking-wide shadow-lg"
          >
            Calificación {{ property.energyCertification }}
          </span>
          <span class="bg-black/50 backdrop-blur-md text-white px-2.5 py-1 rounded text-xs font-medium flex items-center gap-1">
            <span class="material-symbols-outlined text-[14px]">co2</span> {{ property.co2Emissions }} kg/m²
          </span>
        </div>
      </div>
      
      <!-- Detalles de la Propiedad -->
      <div class="p-8">
        <!-- Distintivo de Comparación de CO2 -->
        <div class="mb-6 bg-[#059669]/10 border border-[#059669]/20 rounded-lg p-4">
          <div class="flex items-center gap-2 text-[#059669] dark:text-[#10b981]">
            <span class="material-symbols-outlined text-2xl">eco</span>
            <span class="text-sm font-bold">
              {{ property.co2Savings }}% menos CO₂ que una casa convencional
            </span>
          </div>
        </div>

        <div class="flex justify-between items-start mb-6">
          <div>
            <h1 class="text-3xl font-black mb-2">{{ property.title }}</h1>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] flex items-center gap-2">
              <span class="material-symbols-outlined">location_on</span>
              {{ property.location }}, Valencia, España
            </p>
          </div>
          <p class="text-4xl font-black text-primary">{{ property.price }}€</p>
        </div>
        
        <!-- Características Principales -->
        <div class="grid grid-cols-3 gap-4 mb-8 p-6 bg-[#e7f3eb] dark:bg-[#1a3022] rounded-xl">
          <div class="text-center">
            <span class="material-symbols-outlined text-primary text-3xl">bed</span>
            <p class="font-bold mt-2">{{ property.bedrooms }} Dormitorios</p>
          </div>
          <div class="text-center">
            <span class="material-symbols-outlined text-primary text-3xl">shower</span>
            <p class="font-bold mt-2">{{ property.bathrooms }} Baños</p>
          </div>
          <div class="text-center">
            <span class="material-symbols-outlined text-primary text-3xl">square_foot</span>
            <p class="font-bold mt-2">{{ property.area }} m²</p>
          </div>
        </div>

        <!-- Información Energética -->
        <div class="mb-8 p-6 bg-white dark:bg-[#0d1b12] rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
          <h3 class="font-bold mb-4">Información Energética</h3>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-[#4c9a66] dark:text-[#a0ccb0] mb-2">Tipo de Energía</p>
              <div class="flex flex-wrap gap-2">
                <span 
                  v-for="type in property.energyType" 
                  :key="type"
                  class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold"
                >
                  {{ type }}
                </span>
              </div>
            </div>
            <div>
              <p class="text-sm text-[#4c9a66] dark:text-[#a0ccb0] mb-2">Materiales</p>
              <div class="flex flex-wrap gap-2">
                <span 
                  v-for="material in property.materials" 
                  :key="material"
                  class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold"
                >
                  {{ material }}
                </span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Descripción -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold mb-4">Descripción</h2>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">
            {{ property.description }}
          </p>
        </div>
        
        <!-- Características Sostenibles -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold mb-4">Características Sostenibles</h2>
          <div class="grid grid-cols-2 gap-4">
            <div 
              v-for="feature in property.features" 
              :key="feature"
              class="flex items-center gap-3 p-4 bg-[#e7f3eb] dark:bg-[#1a3022] rounded-lg"
            >
              <span class="material-symbols-outlined text-primary text-2xl">check_circle</span>
              <span class="font-medium">{{ feature }}</span>
            </div>
          </div>
        </div>

        <!-- Checklist de Sostenibilidad -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold mb-6">Checklist de Sostenibilidad</h2>
          
          <!-- Aislamiento Térmico -->
          <div class="mb-6">
            <h3 class="font-bold mb-3 text-[#4c9a66] dark:text-[#a0ccb0]">Aislamiento Térmico</h3>
            <div class="grid grid-cols-2 gap-3">
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.thermalInsulation.climalitWindows ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.thermalInsulation.climalitWindows ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Ventanas Climalit</span>
              </div>
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.thermalInsulation.sateSystem ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.thermalInsulation.sateSystem ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Sistema SATE</span>
              </div>
            </div>
          </div>

          <!-- Fuentes de Energía -->
          <div class="mb-6">
            <h3 class="font-bold mb-3 text-[#4c9a66] dark:text-[#a0ccb0]">Fuentes de Energía</h3>
            <div class="grid grid-cols-2 gap-3">
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.energySources.aerothermal ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.energySources.aerothermal ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Aerotermia</span>
              </div>
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.energySources.solarPanels ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.energySources.solarPanels ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Placas Solares</span>
              </div>
            </div>
          </div>

          <!-- Consumo de Agua -->
          <div class="mb-6">
            <h3 class="font-bold mb-3 text-[#4c9a66] dark:text-[#a0ccb0]">Consumo de Agua</h3>
            <div class="flex items-center gap-2">
              <span 
                :class="property.sustainabilityChecklist.waterConsumption.rainwaterRecovery ? 'text-primary' : 'text-gray-400'"
                class="material-symbols-outlined"
              >
                {{ property.sustainabilityChecklist.waterConsumption.rainwaterRecovery ? 'check_circle' : 'cancel' }}
              </span>
              <span class="text-sm">Sistema de Recuperación de Pluviales</span>
            </div>
          </div>

          <!-- Materiales -->
          <div class="mb-6">
            <h3 class="font-bold mb-3 text-[#4c9a66] dark:text-[#a0ccb0]">Materiales</h3>
            <div class="grid grid-cols-2 gap-3">
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.materials.certifiedWood ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.materials.certifiedWood ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Maderas Certificadas</span>
              </div>
              <div class="flex items-center gap-2">
                <span 
                  :class="property.sustainabilityChecklist.materials.ecologicalPaints ? 'text-primary' : 'text-gray-400'"
                  class="material-symbols-outlined"
                >
                  {{ property.sustainabilityChecklist.materials.ecologicalPaints ? 'check_circle' : 'cancel' }}
                </span>
                <span class="text-sm">Pinturas Ecológicas</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Certificaciones Externas -->
        <div v-if="property.certifications.length > 0" class="mb-8">
          <h2 class="text-2xl font-bold mb-4">Certificaciones Externas</h2>
          <div class="flex flex-wrap gap-4">
            <div 
              v-for="cert in property.certifications" 
              :key="cert"
              class="bg-primary/10 border-2 border-primary rounded-xl p-4 flex items-center gap-3"
            >
              <span class="material-symbols-outlined text-primary text-3xl">verified</span>
              <span class="font-bold text-primary">{{ cert }}</span>
            </div>
          </div>
        </div>
        
        <!-- Llamada a la Acción de Contacto -->
        <div class="flex gap-4">
          <router-link 
            to="/contacto"
            class="flex-1 bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-4 rounded-xl transition-all flex items-center justify-center gap-2"
          >
            <span class="material-symbols-outlined">phone</span>
            Contactar Agente
          </router-link>
          <router-link 
            to="/contacto"
            class="flex-1 bg-[#e7f3eb] dark:bg-[#1a3022] hover:bg-[#cfe7d7] dark:hover:bg-[#2a4a35] font-bold py-4 rounded-xl transition-all flex items-center justify-center gap-2"
          >
            <span class="material-symbols-outlined">calendar_month</span>
            Agendar Visita
          </router-link>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { getPropertyById, type Property } from '../data/properties'

const route = useRoute()
const property = ref<Property | undefined>()

onMounted(() => {
  const id = parseInt(route.params.id as string)
  property.value = getPropertyById(id)
})

const getCertificationColor = (cert: string) => {
  const colors: Record<string, string> = {
    'A': 'bg-[#059669]',
    'B': 'bg-[#10b981]',
    'C': 'bg-[#84cc16]',
    'D': 'bg-[#eab308]',
    'E': 'bg-[#f97316]',
    'F': 'bg-[#ef4444]',
    'G': 'bg-[#dc2626]'
  }
  return colors[cert] || 'bg-gray-500'
}
</script>
