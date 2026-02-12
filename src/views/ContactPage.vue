<template>
  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid md:grid-cols-2 gap-12">
      <!-- Formulario de Contacto -->
      <div>
        <h1 class="text-3xl md:text-4xl font-black mb-4">Contacta con Nosotros</h1>
        <p class="text-[#4c9a66] dark:text-[#a0ccb0] mb-8">
          ¿Tienes alguna pregunta? Estamos aquí para ayudarte a encontrar tu hogar sostenible ideal.
        </p>

        <form @submit.prevent="handleSubmit" class="space-y-6">
          <div>
            <label for="name" class="block text-sm font-bold mb-2">Nombre completo *</label>
            <input type="text" id="name" v-model="form.name" required
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] focus:outline-none focus:ring-2 focus:ring-primary transition-all"
              placeholder="Tu nombre" />
          </div>

          <div>
            <label for="email" class="block text-sm font-bold mb-2">Email *</label>
            <input type="email" id="email" v-model="form.email" required
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] focus:outline-none focus:ring-2 focus:ring-primary transition-all"
              placeholder="tu@email.com" />
          </div>

          <div>
            <label for="phone" class="block text-sm font-bold mb-2">Teléfono</label>
            <input type="tel" id="phone" v-model="form.phone"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] focus:outline-none focus:ring-2 focus:ring-primary transition-all"
              placeholder="+34 600 000 000" />
          </div>

          <div>
            <label for="subject" class="block text-sm font-bold mb-2">Asunto *</label>
            <select id="subject" v-model="form.subject" required
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] focus:outline-none focus:ring-2 focus:ring-primary transition-all">
              <option value="">Selecciona un asunto</option>
              <option value="property">Consulta sobre propiedades</option>
              <option value="audit">Auditoría energética</option>
              <option value="subsidy">Gestión de subvenciones</option>
              <option value="rehabilitation">Proyecto de rehabilitación</option>
              <option value="other">Otro</option>
            </select>
          </div>

          <div>
            <label for="message" class="block text-sm font-bold mb-2">Mensaje *</label>
            <textarea id="message" v-model="form.message" required rows="6"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] focus:outline-none focus:ring-2 focus:ring-primary transition-all resize-none"
              placeholder="Cuéntanos cómo podemos ayudarte..."></textarea>
          </div>

          <button type="submit"
            class="w-full bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-4 rounded-lg transition-all flex items-center justify-center gap-2">
            Enviar mensaje <span class="material-symbols-outlined">send</span>
          </button>
        </form>

        <div v-if="submitted" class="mt-6 bg-[#059669]/10 border border-[#059669]/20 rounded-lg p-4">
          <p class="text-[#059669] dark:text-[#10b981] font-bold flex items-center gap-2">
            <span class="material-symbols-outlined">check_circle</span>
            ¡Mensaje enviado! Te contactaremos pronto.
          </p>
        </div>
      </div>

      <!-- Información de Contacto -->
      <div>
        <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35] mb-8">
          <h2 class="text-2xl font-black mb-6">Información de Contacto</h2>

          <div class="space-y-6">
            <div class="flex items-start gap-4">
              <div class="bg-primary/10 w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary">location_on</span>
              </div>
              <div>
                <h3 class="font-bold mb-1">Dirección</h3>
                <p class="text-[#4c9a66] dark:text-[#a0ccb0]">
                  Partida La Banderilla 44G<br />
                  Valencia, España
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="bg-primary/10 w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary">phone</span>
              </div>
              <div>
                <h3 class="font-bold mb-1">Teléfono</h3>
                <p class="text-[#4c9a66] dark:text-[#a0ccb0]">+34 963 123 456</p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="bg-primary/10 w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary">email</span>
              </div>
              <div>
                <h3 class="font-bold mb-1">Email</h3>
                <p class="text-[#4c9a66] dark:text-[#a0ccb0]">info@serrainova.com</p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="bg-primary/10 w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary">schedule</span>
              </div>
              <div>
                <h3 class="font-bold mb-1">Horario</h3>
                <p class="text-[#4c9a66] dark:text-[#a0ccb0]">
                  Lunes - Viernes: 9:00 - 19:00<br />
                  Sábados: 10:00 - 14:00
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Marcador de Posición del Mapa -->
        <div
          class="bg-[#e7f3eb] dark:bg-[#1a3022] rounded-xl h-64 flex items-center justify-center border border-[#cfe7d7] dark:border-[#2a4a35]">
          <div class="text-center">
            <span class="material-symbols-outlined text-6xl text-primary mb-2">map</span>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] font-medium">Partida La Banderilla 44G, Valencia</p>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
  import { ref } from 'vue'

  const form = ref({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  })

  const submitted = ref(false)

  const handleSubmit = () => {
    // En una aplicación real, esto enviaría los datos del formulario a un backend
    console.log('Form submitted:', form.value)
    submitted.value = true

    // Reiniciar formulario después de 3 segundos
    setTimeout(() => {
      form.value = {
        name: '',
        email: '',
        phone: '',
        subject: '',
        message: ''
      }
      submitted.value = false
    }, 3000)
  }
</script>
