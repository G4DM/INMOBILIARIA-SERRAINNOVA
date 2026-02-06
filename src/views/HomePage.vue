<template>
  <main class="flex flex-col items-center flex-1">
    <!-- Hero Section -->
    <section class="w-full max-w-[1200px] px-4 md:px-10 py-10">
      <div class="@container">
        <div class="relative min-h-[520px] flex flex-col items-center justify-center p-8 rounded-xl overflow-hidden bg-cover bg-center" style='background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtS6z9_dSqmxXFbVgI5jlFOEOOYP57IxznO_pHBRS95BgpZQL2yeBiqYrjykH5SecZtIpmxtZQaxMHTDvAJEkW29SFdtoOUJsJbaW3X7_Ict_Fi4zWQncNvFR9K8BSbEiNYU7qWtmBjuAt4OUpLiae47B9BefQd8fWd1nr9RzB3WkgSMDgRsXMXjxTyMjUgo_RHstcqbVLS1sbJ4qyL4uUjYnDYqW7O9yMSWFy6J7LO4rJjlRqQsnJ_PJaHcbMXLYAN9LX4HQdzbVn");'>
          <div class="z-10 text-center max-w-2xl animate-fade-in">
            <h1 class="text-white text-4xl md:text-6xl font-black leading-tight tracking-tight mb-4">
              Bienvenido a tu inmobiliaria de confianza en Valencia
            </h1>
            <p class="text-white/90 text-lg md:text-xl font-normal mb-10">
              Construyendo un futuro más verde, una casa a la vez con eficiencia energética garantizada.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
              <router-link to="/propiedades" class="min-w-[180px] h-14 bg-primary text-[#0d1b12] rounded-lg font-bold text-lg hover:scale-105 transition-transform flex items-center justify-center">
                Ver propiedades
              </router-link>
              <router-link to="/calculadora" class="min-w-[180px] h-14 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-lg font-bold text-lg hover:bg-white/20 transition-all flex items-center justify-center">
                Calcular impacto
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Stats Section -->
    <section class="w-full max-w-[1200px] px-4 md:px-10 py-12">
      <div class="flex flex-col gap-6">
        <div class="px-4">
          <h2 class="text-2xl md:text-3xl font-bold tracking-tight">Nuestro Impacto Real</h2>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] mt-2">Transformando la huella de carbono del sector inmobiliario local.</p>
        </div>
        <div class="flex flex-wrap gap-6 p-4">
          <div class="flex-1 min-w-[280px] flex flex-col gap-3 rounded-xl p-8 bg-[#e7f3eb] dark:bg-[#1a3022] border border-primary/10">
            <span class="material-symbols-outlined text-primary text-4xl">eco</span>
            <p class="text-[#0d1b12] dark:text-white/80 text-lg font-medium">Total CO2 Ahorrado</p>
            <p class="text-4xl font-black tracking-tight text-primary">850+ Toneladas</p>
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-[#078829] text-sm">trending_up</span>
              <p class="text-[#078829] font-bold">+15% vs Año Pasado</p>
            </div>
          </div>
          <div class="flex-1 min-w-[280px] flex flex-col gap-3 rounded-xl p-8 bg-[#e7f3eb] dark:bg-[#1a3022] border border-primary/10">
            <span class="material-symbols-outlined text-primary text-4xl">bolt</span>
            <p class="text-[#0d1b12] dark:text-white/80 text-lg font-medium">Viviendas eficientes vendidas</p>
            <p class="text-4xl font-black tracking-tight text-primary">120+</p>
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-[#078829] text-sm">trending_up</span>
              <p class="text-[#078829] font-bold">+10% Crecimiento</p>
            </div>
          </div>
          <div class="flex-1 min-w-[280px] flex flex-col gap-3 rounded-xl p-8 bg-[#e7f3eb] dark:bg-[#1a3022] border border-primary/10">
            <span class="material-symbols-outlined text-primary text-4xl">savings</span>
            <p class="text-[#0d1b12] dark:text-white/80 text-lg font-medium">Ahorro Anual Promedio</p>
            <p class="text-4xl font-black tracking-tight text-primary">1.2k €</p>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-sm font-medium">Por hogar en servicios</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Services Section Header -->
    <section class="w-full max-w-[1200px] px-4 md:px-10">
      <div class="flex flex-col md:flex-row md:items-end justify-between px-4 pb-6 pt-10 border-b border-[#e7f3eb] dark:border-[#1a3022]">
        <div>
          <h2 class="text-3xl font-bold tracking-tight">Nuestros Servicios Sostenibles</h2>
          <p class="text-[#4c9a66] mt-2">Especialistas en la transición hacia un hogar eficiente.</p>
        </div>
        <a class="text-primary font-bold flex items-center gap-1 mt-4 md:mt-0 hover:underline" href="#">
          Ver todos los servicios <span class="material-symbols-outlined">arrow_forward</span>
        </a>
      </div>
    </section>
    
    <!-- Text Grid Services -->
    <section class="w-full max-w-[1200px] px-4 md:px-10 py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
        <div class="group flex flex-col gap-4 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] p-8 hover:shadow-xl transition-all">
          <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-3xl">analytics</span>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-xl font-bold">Auditorías Energéticas</h3>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">Análisis detallado del rendimiento energético de tu hogar y calificación de huella de carbono.</p>
          </div>
        </div>
        <div class="group flex flex-col gap-4 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] p-8 hover:shadow-xl transition-all">
          <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-3xl">trending_up</span>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-xl font-bold">Valoraciones Sostenibles</h3>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">Evaluación del valor de mercado basada en eco-eficiencia e instalaciones renovables.</p>
          </div>
        </div>
        <div class="group flex flex-col gap-4 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35] bg-white dark:bg-[#152a1c] p-8 hover:shadow-xl transition-all">
          <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-3xl">energy_savings_leaf</span>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-xl font-bold">Asesoría Hipotecaria Verde</h3>
            <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">Soluciones de financiación exclusivas para renovaciones de ahorro energético y construcciones ecológicas.</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- CTA Impact Section -->
    <section class="w-full max-w-[1200px] px-4 md:px-14 py-16">
      <div class="bg-primary rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center justify-between gap-10">
        <div class="text-[#0d1b12] max-w-xl">
          <h2 class="text-3xl md:text-4xl font-black mb-4">¿Cuánto podrías ahorrar hoy?</h2>
          <p class="text-lg font-medium opacity-80">Calcula el impacto ambiental de tu vivienda actual y descubre cómo mejorar tu eficiencia energética.</p>
        </div>
        <router-link to="/calculadora" class="bg-[#0d1b12] text-white px-10 py-5 rounded-xl font-bold text-lg hover:scale-105 transition-transform flex items-center gap-2">
          Comenzar Cálculo <span class="material-symbols-outlined">calculate</span>
        </router-link>
      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
</script>
