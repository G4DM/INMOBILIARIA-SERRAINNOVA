<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado -->
    <div class="text-center mb-16">
      <h1 class="text-3xl md:text-5xl font-black mb-4">Nuestros Servicios</h1>
      <p class="text-lg text-[#4c9a66] dark:text-[#a0ccb0] max-w-3xl mx-auto">
        Más que venta de propiedades: te acompañamos en tu transición hacia un hogar sostenible
      </p>
    </div>

    <!-- Cuadrícula de Servicios -->
    <div class="space-y-20">
      <!-- Servicio 1: Auditorías Energéticas -->
      <section class="grid md:grid-cols-2 gap-8 items-center">
        <div class="order-2 md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <span class="material-symbols-outlined text-4xl text-primary">assessment</span>
            <h2 class="text-3xl font-black">Auditorías Energéticas</h2>
          </div>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed mb-6">
            Analizamos tu vivienda actual para identificar oportunidades de mejora energética. 
            Nuestros expertos realizan un estudio completo de consumo, aislamiento, sistemas de 
            climatización y proponen soluciones personalizadas para maximizar la eficiencia.
          </p>
          <ul class="space-y-3 mb-6">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
              <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Análisis termográfico completo</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
              <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Estudio de consumo energético</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
              <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Plan de mejoras personalizado</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
              <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Certificación energética oficial</span>
            </li>
          </ul>
        </div>
        <div class="order-1 md:order-2 rounded-xl overflow-hidden h-80">
          <img 
            src="../assets/energy-audit.jpg" 
            alt="Auditoría energética con cámara térmica"
            class="w-full h-full object-cover"
          />
        </div>
      </section>

      <!-- Servicio 2: Gestión de Subvenciones -->
      <section class="grid md:grid-cols-2 gap-8 items-center">
        <div class="rounded-xl overflow-hidden h-80">
          <img 
            src="../assets/subsidy-management.jpg" 
            alt="Gestión de subvenciones y documentación"
            class="w-full h-full object-cover"
          />
        </div>
        <div>
          <div class="flex items-center gap-3 mb-4">
            <span class="material-symbols-outlined text-4xl text-primary">euro</span>
            <h2 class="text-3xl font-black">Gestión de Subvenciones</h2>
          </div>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed mb-6">
            Te ayudamos a acceder a todas las ayudas disponibles para rehabilitación energética. 
            Gestionamos la documentación y tramitación de fondos Next Generation EU, subvenciones 
            autonómicas y municipales para que no pierdas ninguna oportunidad de financiación.
          </p>
          <div class="bg-white dark:bg-[#152a1c] border border-[#cfe7d7] dark:border-[#2a4a35] rounded-xl p-6 mb-6">
            <h3 class="font-bold mb-4">Fondos disponibles:</h3>
            <ul class="space-y-2">
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-sm">arrow_right</span>
                <span class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">Next Generation EU - hasta 40% del coste</span>
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-sm">arrow_right</span>
                <span class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">Programa PREE - rehabilitación energética</span>
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-sm">arrow_right</span>
                <span class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">Ayudas IVE - Comunidad Valenciana</span>
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-sm">arrow_right</span>
                <span class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">Deducciones fiscales IRPF</span>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Servicio 3: Proyectos de Rehabilitación -->
      <section class="grid md:grid-cols-2 gap-8 items-center">
        <div class="order-2 md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <span class="material-symbols-outlined text-4xl text-primary">home_repair_service</span>
            <h2 class="text-3xl font-black">Proyectos de Rehabilitación</h2>
          </div>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed mb-6">
            Transformamos viviendas antiguas en hogares eficientes y sostenibles. Gestionamos 
            todo el proceso de rehabilitación, desde el diseño hasta la ejecución, garantizando 
            mejoras significativas en eficiencia energética y confort.
          </p>
          
          <!-- Ejemplo Antes/Después -->
          <div class="bg-white dark:bg-[#152a1c] border border-[#cfe7d7] dark:border-[#2a4a35] rounded-xl p-6 mb-6">
            <h3 class="font-bold mb-4">Caso de éxito: Vivienda en Valencia</h3>
            <div class="grid grid-cols-2 gap-4 mb-4">
              <div>
                <p class="text-xs font-bold text-[#4c9a66] dark:text-[#a0ccb0] mb-2">ANTES</p>
                <div class="space-y-1 text-sm">
                  <p class="flex items-center gap-2">
                    <span class="bg-[#dc2626] text-white px-2 py-0.5 rounded text-xs font-bold">G</span>
                    <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Calificación</span>
                  </p>
                  <p class="text-[#4c9a66] dark:text-[#a0ccb0]">65 kg CO₂/m²</p>
                  <p class="text-[#4c9a66] dark:text-[#a0ccb0]">280€/mes energía</p>
                </div>
              </div>
              <div>
                <p class="text-xs font-bold text-[#4c9a66] dark:text-[#a0ccb0] mb-2">DESPUÉS</p>
                <div class="space-y-1 text-sm">
                  <p class="flex items-center gap-2">
                    <span class="bg-[#059669] text-white px-2 py-0.5 rounded text-xs font-bold">A</span>
                    <span class="text-[#4c9a66] dark:text-[#a0ccb0]">Calificación</span>
                  </p>
                  <p class="text-[#4c9a66] dark:text-[#a0ccb0]">12 kg CO₂/m²</p>
                  <p class="text-[#4c9a66] dark:text-[#a0ccb0]">95€/mes energía</p>
                </div>
              </div>
            </div>
            <div class="bg-[#059669]/10 border border-[#059669]/20 rounded-lg p-3">
              <p class="text-sm font-bold text-[#059669] dark:text-[#10b981]">
                ✓ Ahorro del 66% en costes energéticos
              </p>
            </div>
          </div>

        </div>
        <div class="order-1 md:order-2 rounded-xl overflow-hidden h-80">
          <img 
            src="../assets/rehabilitation-project.jpg" 
            alt="Proyecto de rehabilitación energética"
            class="w-full h-full object-cover"
          />
        </div>
      </section>
    </div>

    <!-- Sección de Llamada a la Acción -->
    <section class="mt-20 bg-primary rounded-2xl p-12 text-center">
      <h2 class="text-3xl font-black text-[#0d1b12] mb-4">¿Listo para transformar tu hogar?</h2>
      <p class="text-[#0d1b12] mb-8 max-w-2xl mx-auto">
        Contacta con nuestro equipo de expertos y descubre cómo podemos ayudarte a crear un hogar más sostenible y eficiente.
      </p>
      <router-link 
        to="/contacto"
        class="inline-flex items-center gap-2 bg-[#0d1b12] text-primary font-bold px-8 py-4 rounded-lg hover:bg-[#1a3022] transition-all"
      >
        <span class="text-white">Contactar ahora</span>
        <span class="material-symbols-outlined text-white">arrow_forward</span>
      </router-link>
    </section>
  </main>
</template>

<script>
</script>
