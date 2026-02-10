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
          <li><router-link class="hover:text-primary transition-colors" to="/propiedades">Venta de Propiedades</router-link></li>
          <li><router-link class="hover:text-primary transition-colors" to="/propiedades">Alquiler Sostenible</router-link></li>
          <li><router-link class="hover:text-primary transition-colors" to="/propiedades">Proyectos Obra Nueva</router-link></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-6">Compañía</h4>
        <ul class="flex flex-col gap-3 text-sm opacity-80">
          <li><router-link class="hover:text-primary transition-colors" to="/quienes-somos">Sobre Nosotros</router-link></li>
          <li><router-link class="hover:text-primary transition-colors" to="/blog">Blog de Sostenibilidad</router-link></li>

        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-6">Contacto</h4>
        <p class="text-sm opacity-80 mb-2">Partida La Banderilla 44G</p>
        <p class="text-sm opacity-80 mb-2">Valencia, España</p>
        <p class="text-sm font-bold mt-4 text-primary">+34 963 123 456</p>
        <p class="text-sm opacity-80">info@serrainova.es</p>
      </div>
    </div>
    <div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-[#cfe7d7] dark:border-[#1a3022] flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-xs opacity-60">© 2026 SERRAINOVA. Todos los derechos reservados.</p>
      <div class="flex gap-6 text-xs opacity-60">
        <router-link class="hover:underline" to="/contacto">Privacidad</router-link>
        <router-link class="hover:underline" to="/contacto">Legal</router-link>
        <router-link class="hover:underline" to="/contacto">Cookies</router-link>
      </div>
    </div>
  </footer>
</template>

