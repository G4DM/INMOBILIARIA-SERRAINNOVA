<template>
  <main
    class="min-h-screen bg-gradient-to-br from-[#f6f8f6] to-[#e7f3eb] dark:from-[#08150d] dark:to-[#0d1b12] py-12 px-6 lg:px-40">
    <div class="max-w-[1400px] mx-auto">
      <!-- Header -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <router-link to="/admin" class="text-primary hover:underline mb-2 inline-block">← Volver al
            Panel</router-link>
          <h1 class="text-4xl font-black">Gestión de Propiedades</h1>
          <p class="text-lg opacity-70 mt-2">{{ properties.length }} propiedades en total</p>
        </div>
        <button @click="openAddPropertyModal"
          class="bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold px-6 py-3 rounded-lg transition-all flex items-center gap-2">
          <span class="material-symbols-outlined">add</span>
          Añadir Propiedad
        </button>
      </div>

      <!-- Buscador -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-6 mb-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-bold mb-2">Buscar por título</label>
            <input v-model="searchQuery" type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              placeholder="Ej: Villa Solar..." />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Ubicación</label>
            <input v-model="searchLocation" type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              placeholder="Ej: Valencia..." />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Calificación Energética</label>
            <select v-model="searchCertification"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary">
              <option value="">Todas</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Tabla de Propiedades -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-[#e7f3eb] dark:bg-[#1a3022]">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Imagen</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Propiedad</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Ubicación</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Precio</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Calificación</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Acciones</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#e7f3eb] dark:divide-[#1a3022]">
              <tr v-for="property in filteredProperties" :key="property.id"
                class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors"
                :class="{ 'opacity-50': property.hidden }">
                <td class="px-6 py-4">
                  <img :src="property.image" :alt="property.title" class="w-16 h-16 object-cover rounded-lg" />
                </td>
                <td class="px-6 py-4 font-medium max-w-xs">{{ property.title }}</td>
                <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">{{ property.location }}</td>
                <td class="px-6 py-4 font-bold">{{ property.price?.toLocaleString('es-ES') }}€</td>
                <td class="px-6 py-4">
                  <span :class="getCertificationColor(property.energyCertification)"
                    class="text-white px-2 py-1 rounded text-xs font-bold">
                    {{ property.energyCertification }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <span v-if="property.hidden"
                    class="text-red-600 dark:text-red-400 font-medium flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">visibility_off</span>
                    Oculta
                  </span>
                  <span v-else class="text-primary font-medium flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">visibility</span>
                    Visible
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex gap-2">
                    <button @click="editProperty(property)"
                      class="px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 rounded-lg font-medium transition-all text-sm flex items-center gap-1">
                      <span class="material-symbols-outlined text-sm">edit</span>
                      Editar
                    </button>
                    <button @click="togglePropertyVisibility(property)"
                      class="px-3 py-1.5 rounded-lg font-medium transition-all text-sm" :class="property.hidden
                        ? 'bg-primary hover:bg-primary/90 text-[#0d1b12]'
                        : 'bg-red-100 hover:bg-red-200 text-red-700 dark:bg-red-900/30 dark:text-red-400'">
                      {{ property.hidden ? 'Mostrar' : 'Ocultar' }}
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal de Formulario de Propiedad (Añadir/Editar) -->
    <div v-if="showPropertyModal"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4 overflow-y-auto"
      @click.self="closePropertyModal">
      <div
        class="bg-white dark:bg-[#152a1c] rounded-xl p-8 max-w-2xl w-full border border-[#cfe7d7] dark:border-[#2a4a35] my-8">
        <h3 class="text-2xl font-bold mb-6">{{ isEditingProperty ? 'Editar Propiedad' : 'Añadir Nueva Propiedad' }}</h3>
        <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">
          <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Título</label>
              <input v-model="editingProperty.title" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Villa Solar Pasiva Moderna" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Precio (€)</label>
              <input v-model.number="editingProperty.price" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: 895000" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Ubicación</label>
              <input v-model="editingProperty.location" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Valencia" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Dormitorios</label>
              <input v-model.number="editingProperty.bedrooms" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="3" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Baños</label>
              <input v-model.number="editingProperty.bathrooms" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="2" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Área (m²)</label>
              <input v-model.number="editingProperty.area" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="250" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Calificación Energética</label>
              <select v-model="editingProperty.energyCertification"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Emisiones CO2 (kg/m²)</label>
              <input v-model.number="editingProperty.co2Emissions" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="12" />
            </div>

            <div>
              <label class="block text-sm font-bold mb-2">Ahorro CO2 (%)</label>
              <input v-model.number="editingProperty.co2Savings" type="number"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="65" />
            </div>

            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">URL de Imagen</label>
              <input v-model="editingProperty.image" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="https://images.unsplash.com/..." />
            </div>

            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Descripción</label>
              <textarea v-model="editingProperty.description" rows="3"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Descripción detallada de la propiedad..."></textarea>
            </div>

            <!-- Sección de Sostenibilidad -->
            <div class="col-span-2 mt-4 pt-4 border-t border-[#e7f3eb] dark:border-[#1a3022]">
              <h4 class="text-lg font-bold mb-4 text-primary">Características Sostenibles</h4>
            </div>

            <!-- Tipos de Energía -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Tipos de Energía (separados por coma)</label>
              <input v-model="energyTypesInput" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Solar, Aerotermia, Biomasa" />
            </div>

            <!-- Materiales -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Materiales (separados por coma)</label>
              <input v-model="materialsInput" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Madera certificada, Pinturas ecológicas" />
            </div>

            <!-- Características adicionales -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Características (separadas por coma)</label>
              <input v-model="featuresInput" type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Piscina ecológica, Huerto urbano, Sistema de reciclaje" />
            </div>

            <!-- Checklist de Sostenibilidad -->
            <div class="col-span-2 mt-4 pt-4 border-t border-[#e7f3eb] dark:border-[#1a3022]">
              <h4 class="text-lg font-bold mb-4 text-primary">Checklist de Sostenibilidad</h4>
            </div>

            <!-- Aislamiento Térmico -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Aislamiento Térmico</label>
              <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.thermalInsulation.climalitWindows"
                    type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Ventanas Climalit</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.thermalInsulation.sateSystem" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Sistema SATE</span>
                </label>
              </div>
            </div>

            <!-- Fuentes de Energía -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Fuentes de Energía</label>
              <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.energySources.aerothermal" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Aerotermia</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.energySources.solarPanels" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Paneles Solares</span>
                </label>
              </div>
            </div>

            <!-- Consumo de Agua -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Consumo de Agua</label>
              <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.waterConsumption.rainwaterRecovery"
                    type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Recuperación de Agua de Lluvia</span>
                </label>
              </div>
            </div>

            <!-- Materiales Sostenibles -->
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Materiales Sostenibles</label>
              <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.materials.certifiedWood" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Madera Certificada</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="editingProperty.sustainabilityChecklist.materials.ecologicalPaints" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm">Pinturas Ecológicas</span>
                </label>
              </div>
            </div>

            <!-- Certificaciones Externas -->
            <div class="col-span-2 mt-4 pt-4 border-t border-[#e7f3eb] dark:border-[#1a3022]">
              <h4 class="text-lg font-bold mb-4 text-primary">Certificaciones Externas</h4>
            </div>

            <div class="col-span-2">
              <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="certificationsCheckbox.BREEAM" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm font-medium">BREEAM</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="certificationsCheckbox.LEED" type="checkbox"
                    class="w-full px-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm font-medium">LEED</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                  <input v-model="certificationsCheckbox.Passivhaus" type="checkbox"
                    class="w-4 h-4 rounded border-[#cfe7d7] dark:border-[#2a4a35] text-primary focus:ring-primary" />
                  <span class="text-sm font-medium">Passivhaus</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="flex gap-3 mt-6">
          <button @click="saveProperty"
            class="flex-1 bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-3 rounded-lg transition-all">
            {{ isEditingProperty ? 'Guardar Cambios' : 'Añadir Propiedad' }}
          </button>
          <button @click="closePropertyModal"
            class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 font-bold py-3 rounded-lg transition-all">
            Cancelar
          </button>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
  import { ref, computed, onMounted } from 'vue'
  import { userStore } from '../store/userStore'

  // Estado reactivo
  const properties = ref([])
  const loading = ref(true)
  const error = ref(null)

  // Buscador
  const searchQuery = ref('')
  const searchLocation = ref('')
  const searchCertification = ref('')

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

  // Propiedades filtradas
  const filteredProperties = computed(() => {
    return properties.value.filter(property => {
      const title = property.title || ''
      const location = property.location || ''
      const certification = property.energyCertification || ''

      const matchesTitle = title.toLowerCase().includes(searchQuery.value.toLowerCase())
      const matchesLocation = location.toLowerCase().includes(searchLocation.value.toLowerCase())
      const matchesCertification = searchCertification.value === '' || certification === searchCertification.value

      return matchesTitle && matchesLocation && matchesCertification
    })
  })

  // Modales de propiedades
  const showPropertyModal = ref(false)
  const editingProperty = ref({})
  const isEditingProperty = ref(false)

  // Variables reactivas para campos de texto separados por comas
  const energyTypesInput = ref('')
  const materialsInput = ref('')
  const featuresInput = ref('')
  const certificationsCheckbox = ref({
    BREEAM: false,
    LEED: false,
    Passivhaus: false
  })

  // Plantilla de propiedad vacía
  const emptyProperty = () => ({
    title: '',
    price: '',
    location: 'Valencia',
    bedrooms: 3,
    bathrooms: 2,
    area: 150,
    image: '',
    energyCertification: 'A',
    energyType: ['Solar'],
    materials: ['Madera certificada'],
    co2Emissions: 12,
    co2Savings: 65,
    description: '',
    features: [],
    sustainabilityChecklist: {
      thermalInsulation: {
        climalitWindows: true,
        sateSystem: true
      },
      energySources: {
        aerothermal: true,
        solarPanels: true
      },
      waterConsumption: {
        rainwaterRecovery: true
      },
      materials: {
        certifiedWood: true,
        ecologicalPaints: true
      }
    },
    certifications: [],
    hidden: false
  })

  // Funciones de gestión de propiedades
  const openAddPropertyModal = () => {
    editingProperty.value = emptyProperty()
    isEditingProperty.value = false

    // Inicializar campos de texto
    energyTypesInput.value = 'Solar'
    materialsInput.value = 'Madera certificada'
    featuresInput.value = ''
    certificationsCheckbox.value = { BREEAM: false, LEED: false, Passivhaus: false }

    showPropertyModal.value = true
  }

  const editProperty = (property) => {
    editingProperty.value = { ...property }
    isEditingProperty.value = true

    // Convertir arrays a strings para los inputs
    energyTypesInput.value = Array.isArray(property.energyType) ? property.energyType.join(', ') : ''
    materialsInput.value = Array.isArray(property.materials) ? property.materials.join(', ') : ''
    featuresInput.value = Array.isArray(property.features) ? property.features.join(', ') : ''

    // Convertir array de certificaciones a checkboxes
    const certs = Array.isArray(property.certifications) ? property.certifications : []
    certificationsCheckbox.value = {
      BREEAM: certs.includes('BREEAM'),
      LEED: certs.includes('LEED'),
      Passivhaus: certs.includes('Passivhaus')
    }

    showPropertyModal.value = true
  }

  const saveProperty = async () => {
    try {
      // Convertir strings a arrays
      editingProperty.value.energyType = energyTypesInput.value
        .split(',')
        .map(item => item.trim())
        .filter(item => item.length > 0)

      editingProperty.value.materials = materialsInput.value
        .split(',')
        .map(item => item.trim())
        .filter(item => item.length > 0)

      editingProperty.value.features = featuresInput.value
        .split(',')
        .map(item => item.trim())
        .filter(item => item.length > 0)

      // Convertir checkboxes a array de certificaciones
      editingProperty.value.certifications = Object.keys(certificationsCheckbox.value)
        .filter(key => certificationsCheckbox.value[key])

      const url = isEditingProperty.value
        ? `http://localhost:8000/api/properties/${editingProperty.value.id}`
        : 'http://localhost:8000/api/properties'

      const method = isEditingProperty.value ? 'PUT' : 'POST'

      const response = await fetch(url, {
        method,
        headers: {
          'Authorization': `Bearer ${userStore.token}`,
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(editingProperty.value)
      })

      if (!response.ok) throw new Error('Error al guardar propiedad')

      const savedProperty = await response.json()

      if (isEditingProperty.value) {
        const index = properties.value.findIndex(p => p.id === savedProperty.id)
        if (index !== -1) properties.value[index] = savedProperty
      } else {
        properties.value.push(savedProperty)
      }

      closePropertyModal()
    } catch (err) {
      alert(err.message)
    }
  }

  const closePropertyModal = () => {
    showPropertyModal.value = false
    editingProperty.value = {}
    isEditingProperty.value = false
  }

  const togglePropertyVisibility = async (property) => {
    try {
      const updatedProperty = { ...property, hidden: !property.hidden }
      const response = await fetch(`http://localhost:8000/api/properties/${property.id}`, {
        method: 'PUT',
        headers: {
          'Authorization': `Bearer ${userStore.token}`,
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(updatedProperty)
      })

      if (!response.ok) throw new Error('Error al cambiar visibilidad')

      const data = await response.json()
      const index = properties.value.findIndex(p => p.id === data.id)
      if (index !== -1) properties.value[index] = data
    } catch (err) {
      alert(err.message)
    }
  }

  const getCertificationColor = (certification) => {
    const colors = {
      'A': 'bg-[#059669]',
      'B': 'bg-[#10b981]',
      'C': 'bg-[#34d399]',
      'D': 'bg-[#fbbf24]',
      'E': 'bg-[#f59e0b]',
      'F': 'bg-[#f97316]',
      'G': 'bg-[#ef4444]'
    }
    return colors[certification] || 'bg-gray-500'
  }
</script>
