<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
      <h2 class="text-2xl md:text-3xl font-bold">Listado de Propiedades Sostenibles</h2>
      <p class="text-[#4c9a66] dark:text-[#a0ccb0] mt-2">
        Mostrando {{ filteredProperties.length }} de {{ properties.length }} propiedades ecológicas en Valencia
      </p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Barra Lateral de Filtros -->
      <div class="lg:w-80 flex-shrink-0">
        <PropertyFilters @filter-change="handleFilterChange" />
      </div>

      <!-- Cuadrícula de Propiedades -->
      <div class="flex-1">
        <div v-if="filteredProperties.length === 0" class="text-center py-12">
          <span class="material-symbols-outlined text-6xl text-[#4c9a66] dark:text-[#a0ccb0] mb-4">search_off</span>
          <p class="text-xl font-bold mb-2">No se encontraron propiedades</p>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0]">Intenta ajustar los filtros</p>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
          <div v-for="property in filteredProperties" :key="property.id"
            class="group bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-[#cfe7d7] dark:border-[#2a4a35]">
            <div class="relative h-56 overflow-hidden">
              <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                :src="property.image" :alt="property.title" />
              <div class="absolute top-4 left-4 flex gap-2">
                <span :class="getCertificationColor(property.energyCertification)"
                  class="text-white px-2.5 py-1 rounded text-xs font-bold uppercase tracking-wide shadow-lg">
                  Calificación {{ property.energyCertification }}
                </span>
                <span
                  class="bg-black/50 backdrop-blur-md text-white px-2.5 py-1 rounded text-xs font-medium flex items-center gap-1">
                  <span class="material-symbols-outlined text-[14px]">co2</span> {{ property.co2Emissions }} kg/m²
                </span>
              </div>
            </div>
            <div class="p-5">
              <!-- Distintivo de Comparación de CO2 -->
              <div class="mb-3 bg-[#059669]/10 border border-[#059669]/20 rounded-lg p-3">
                <div class="flex items-center gap-2 text-[#059669] dark:text-[#10b981]">
                  <span class="material-symbols-outlined text-lg">eco</span>
                  <span class="text-xs font-bold">
                    {{ property.co2Savings }}% menos CO₂ que una casa convencional
                  </span>
                </div>
              </div>

              <div class="flex justify-between items-start mb-2">
                <h3 class="text-lg font-bold">{{ property.title }}</h3>
                <p class="text-primary font-bold text-lg">{{ property.price }}€</p>
              </div>
              <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-sm flex items-center gap-1 mb-4">
                <span class="material-symbols-outlined text-sm">location_on</span> {{ property.location }}
              </p>
              <div
                class="flex items-center gap-4 text-xs font-semibold text-[#4c9a66] dark:text-[#a0ccb0] mb-6 border-t border-[#e7f3eb] dark:border-[#1a3022] pt-4">
                <span class="flex items-center gap-1">
                  <span class="material-symbols-outlined text-sm">bed</span> {{ property.bedrooms }} Dorm.
                </span>
                <span class="flex items-center gap-1">
                  <span class="material-symbols-outlined text-sm">shower</span> {{ property.bathrooms }} Baños
                </span>
                <span class="flex items-center gap-1">
                  <span class="material-symbols-outlined text-sm">square_foot</span> {{ property.area }}m²
                </span>
              </div>
              <router-link :to="`/propiedad/${property.id}`"
                class="w-full bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2">
                Ver Vivienda <span class="material-symbols-outlined">arrow_forward</span>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
  import { ref, computed, onMounted } from 'vue'
  import PropertyFilters from '../components/PropertyFilters.vue'

  const properties = ref([])
  const loading = ref(true)
  const error = ref(null)

  const fetchProperties = async () => {
    try {
      loading.value = true
      const response = await fetch('http://localhost:8000/api/properties')
      if (!response.ok) throw new Error('Error al cargar propiedades')
      properties.value = await response.json()
    } catch (err) {
      error.value = err.message
      console.error(err)
    } finally {
      loading.value = false
    }
  }

  onMounted(fetchProperties)

  const filters = ref({
    certifications: [],
    energyTypes: [],
    materials: []
  })

  const handleFilterChange = (newFilters) => {
    filters.value = newFilters
  }

  const filteredProperties = computed(() => {
    return properties.value.filter(property => {
      // Excluir propiedades ocultas
      if (property.hidden) return false

      const certMatch = filters.value.certifications.length === 0 ||
        filters.value.certifications.includes(property.energyCertification)

      const energyMatch = filters.value.energyTypes.length === 0 ||
        filters.value.energyTypes.some(type => property.energyType.includes(type))

      const materialMatch = filters.value.materials.length === 0 ||
        filters.value.materials.some(material => property.materials.includes(material))

      return certMatch && energyMatch && materialMatch
    })
  })

  const getCertificationColor = (cert) => {
    const colors = {
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
