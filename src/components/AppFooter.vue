<template>
  <footer class="w-full bg-[#e7f3eb] dark:bg-[#08150d] py-16 px-6 lg:px-40 border-t border-[#cfe7d7] dark:border-[#1a3022]">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
      <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2">
          <img src="../assets/logo.png" alt="SERRAINOVA Logo" class="h-6 w-auto" />
          <h2 class="text-xl font-bold">SERRAINOVA</h2>
        </div>
        <p class="text-sm opacity-70">Liderando el cambio hacia un mercado inmobiliario consciente y eficiente en Valencia.</p>
      </div>
      <div>
        <h4 class="font-bold mb-6">Enlaces</h4>
        <ul class="flex flex-col gap-3 text-sm opacity-80">
          <li><a class="hover:text-primary transition-colors" href="#">Venta de Propiedades</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Alquiler Sostenible</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Proyectos Obra Nueva</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Inversión ESG</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-6">Compañía</h4>
        <ul class="flex flex-col gap-3 text-sm opacity-80">
          <li><a class="hover:text-primary transition-colors" href="#">Sobre Nosotros</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Blog de Sostenibilidad</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Carreras</a></li>
          <li><a class="hover:text-primary transition-colors" href="#">Prensa</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-6">Contacto</h4>
        <p class="text-sm opacity-80 mb-2">Partida La Banderilla 44G</p>
        <p class="text-sm opacity-80 mb-2">Valencia, España</p>
        <p class="text-sm font-bold mt-4 text-primary">+34 960 000 000</p>
        <p class="text-sm opacity-80">info@serrainova.es</p>
      </div>
    </div>
    <div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-[#cfe7d7] dark:border-[#1a3022] flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-xs opacity-60">© 2024 SERRAINOVA. Todos los derechos reservados.</p>
      <div class="flex gap-6 text-xs opacity-60">
        <a class="hover:underline" href="#">Privacidad</a>
        <a class="hover:underline" href="#">Legal</a>
        <a class="hover:underline" href="#">Cookies</a>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
</script>
