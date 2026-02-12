<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Sección Principal -->
    <section class="text-center mb-20">
      <h1 class="text-4xl md:text-6xl font-black mb-6">Quiénes Somos</h1>
      <p class="text-xl text-[#4c9a66] dark:text-[#a0ccb0] max-w-3xl mx-auto leading-relaxed">
        Pioneros en vivienda sostenible en Valencia, transformando el sector inmobiliario
        hacia un futuro más verde y eficiente.
      </p>
    </section>

    <!-- Misión, Visión, Valores -->
    <section class="grid md:grid-cols-3 gap-8 mb-20">
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
          <span class="material-symbols-outlined text-3xl text-primary">flag</span>
        </div>
        <h2 class="text-2xl font-black mb-4">Misión</h2>
        <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">
          Facilitar el acceso a viviendas sostenibles y energéticamente eficientes,
          contribuyendo a la lucha contra el cambio climático y mejorando la calidad
          de vida de nuestros clientes.
        </p>
      </div>

      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
          <span class="material-symbols-outlined text-3xl text-primary">visibility</span>
        </div>
        <h2 class="text-2xl font-black mb-4">Visión</h2>
        <p class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">
          Ser la referencia en el mercado inmobiliario sostenible de la Comunidad Valenciana,
          liderando la transformación hacia ciudades más verdes y habitables para las
          generaciones futuras.
        </p>
      </div>

      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
          <span class="material-symbols-outlined text-3xl text-primary">favorite</span>
        </div>
        <h2 class="text-2xl font-black mb-4">Valores</h2>
        <ul class="space-y-2 text-[#4c9a66] dark:text-[#a0ccb0]">
          <li class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-1">check</span>
            <span>Sostenibilidad</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-1">check</span>
            <span>Transparencia</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-1">check</span>
            <span>Innovación</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-1">check</span>
            <span>Compromiso social</span>
          </li>
        </ul>
      </div>
    </section>

    <!-- Métricas de Impacto -->
    <section class="bg-primary rounded-2xl p-12 mb-20">
      <h2 class="text-3xl font-black text-[#0d1b12] text-center mb-12">Nuestro Impacto</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="text-5xl font-black text-[#0d1b12] mb-2">2,450</div>
          <p class="text-[#0d1b12] font-bold mb-1">Toneladas de CO₂</p>
          <p class="text-[#0d1b12]/80 text-sm">ahorradas con nuestros proyectos</p>
        </div>
        <div class="text-center">
          <div class="text-5xl font-black text-[#0d1b12] mb-2">340+</div>
          <p class="text-[#0d1b12] font-bold mb-1">Viviendas Sostenibles</p>
          <p class="text-[#0d1b12]/80 text-sm">vendidas desde 2020</p>
        </div>
        <div class="text-center">
          <div class="text-5xl font-black text-[#0d1b12] mb-2">95%</div>
          <p class="text-[#0d1b12] font-bold mb-1">Satisfacción</p>
          <p class="text-[#0d1b12]/80 text-sm">de nuestros clientes</p>
        </div>
      </div>
    </section>

    <!-- Compromisos con los ODS -->
    <section class="mb-20">
      <h2 class="text-3xl font-black text-center mb-6">Compromisos con los ODS</h2>
      <p class="text-center text-[#4c9a66] dark:text-[#a0ccb0] mb-12 max-w-3xl mx-auto">
        Alineamos nuestra actividad con los Objetivos de Desarrollo Sostenible de las Naciones Unidas
      </p>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- ODS 7 -->
        <div
          class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35] text-center">
          <div class="bg-[#FCC30B] w-24 h-24 rounded-xl flex items-center justify-center mx-auto mb-6">
            <span class="text-white text-4xl font-black">7</span>
          </div>
          <h3 class="text-xl font-bold mb-3">Energía Asequible y No Contaminante</h3>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-sm">
            Promovemos el uso de energías renovables en todas nuestras propiedades,
            facilitando el acceso a sistemas solares y aerotérmicos.
          </p>
        </div>

        <!-- ODS 11 -->
        <div
          class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35] text-center">
          <div class="bg-[#FD9D24] w-24 h-24 rounded-xl flex items-center justify-center mx-auto mb-6">
            <span class="text-white text-4xl font-black">11</span>
          </div>
          <h3 class="text-xl font-bold mb-3">Ciudades y Comunidades Sostenibles</h3>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-sm">
            Contribuimos a crear comunidades más habitables, seguras y sostenibles
            mediante viviendas eficientes y respetuosas con el medio ambiente.
          </p>
        </div>

        <!-- ODS 13 -->
        <div
          class="bg-white dark:bg-[#152a1c] rounded-xl p-8 border border-[#cfe7d7] dark:border-[#2a4a35] text-center">
          <div class="bg-[#3F7E44] w-24 h-24 rounded-xl flex items-center justify-center mx-auto mb-6">
            <span class="text-white text-4xl font-black">13</span>
          </div>
          <h3 class="text-xl font-bold mb-3">Acción por el Clima</h3>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-sm">
            Cada vivienda que comercializamos reduce significativamente las emisiones
            de CO₂, contribuyendo activamente a la lucha contra el cambio climático.
          </p>
        </div>
      </div>
    </section>

    <!-- Sección de Equipo/Historia -->
    <section class="bg-[#e7f3eb] dark:bg-[#1a3022] rounded-2xl p-12">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-black mb-6">Nuestra Historia</h2>
        <div class="space-y-4 text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed">
          <p>
            SERRAINOVA nace en 2020 con una visión clara: revolucionar el mercado inmobiliario
            valenciano hacia la sostenibilidad. Fundada por un equipo de profesionales apasionados
            por la arquitectura sostenible y el medio ambiente, hemos crecido hasta convertirnos
            en referentes del sector.
          </p>
          <p>
            Desde nuestros inicios, hemos ayudado a más de 340 familias a encontrar su hogar
            sostenible ideal, ahorrando colectivamente más de 2,450 toneladas de CO₂. Nuestro
            compromiso va más allá de la venta: ofrecemos asesoramiento integral, gestión de
            subvenciones y seguimiento post-venta.
          </p>
          <p>
            Miramos hacia el futuro con optimismo, trabajando cada día para hacer de Valencia
            una ciudad más verde, eficiente y habitable para todos.
          </p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
</script>
