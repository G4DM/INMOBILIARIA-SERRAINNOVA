<template>
  <header class="sticky top-0 z-50 w-full border-b border-solid border-white/10 bg-[#102216] text-white backdrop-blur-md">
    <div class="flex items-center justify-between max-w-[1200px] mx-auto px-6 lg:px-8 py-4">
      <div class="flex items-center gap-3">
        <img src="../assets/logo.png" alt="SERRAINOVA Logo" class="h-8 w-auto" />
        <h2 class="text-lg font-bold tracking-tight text-white">SERRAINOVA</h2>
      </div>
      
      <!-- Navegación de Escritorio -->
      <nav class="hidden md:flex items-center gap-8">
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/">Inicio</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/propiedades">Propiedades</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/quienes-somos">Quiénes Somos</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/servicios">Servicios</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/blog">Blog</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/calculadora">Impacto</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors text-white/90" to="/contacto">Contacto</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors bg-white/10 px-3 py-1.5 rounded-lg text-white" to="/admin">Administrador</router-link>
      </nav>

      <!-- Botón de Menú Móvil -->
      <button 
        @click="toggleMenu"
        class="md:hidden p-2 hover:bg-white/10 rounded-lg transition-all duration-300 hover:scale-110 text-white"
        aria-label="Toggle menu"
      >
        <span class="material-symbols-outlined text-2xl transition-transform duration-300" :class="{ 'rotate-90': isMenuOpen }">
          {{ isMenuOpen ? 'close' : 'menu' }}
        </span>
      </button>
    </div>

    <!-- Menú de Navegación Móvil -->
    <Transition name="slide-down">
      <div 
        v-show="isMenuOpen" 
        class="md:hidden border-t border-white/10 bg-[#102216] overflow-hidden"
      >
        <nav class="flex flex-col max-w-[1200px] mx-auto">
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">home</span>
              Inicio
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/propiedades"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">apartment</span>
              Propiedades
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/quienes-somos"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">groups</span>
              Quiénes Somos
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/servicios"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">handyman</span>
              Servicios
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/blog"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">article</span>
              Blog
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-white/10 transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/calculadora"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">eco</span>
              Impacto
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary text-white/90" 
            to="/contacto"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">mail</span>
              Contacto
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium transition-all duration-300 hover:bg-white/10 hover:pl-8 hover:text-primary bg-white/5 text-white" 
            to="/admin"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">admin_panel_settings</span>
              Administrador
            </span>
          </router-link>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const isMenuOpen = ref(false)

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}
</script>

<style scoped>
/* Transición de deslizamiento hacia abajo para menú móvil */
.slide-down-enter-active {
  animation: slideDown 0.3s ease-out;
}

.slide-down-leave-active {
  animation: slideUp 0.2s ease-in;
}

@keyframes slideDown {
  from {
    max-height: 0;
    opacity: 0;
  }
  to {
    max-height: 500px;
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    max-height: 500px;
    opacity: 1;
  }
  to {
    max-height: 0;
    opacity: 0;
  }
}

/* Animación de elementos del menú */
.menu-item {
  animation: fadeInLeft 0.3s ease-out backwards;
}

.menu-item:nth-child(1) { animation-delay: 0.05s; }
.menu-item:nth-child(2) { animation-delay: 0.1s; }
.menu-item:nth-child(3) { animation-delay: 0.15s; }
.menu-item:nth-child(4) { animation-delay: 0.2s; }
.menu-item:nth-child(5) { animation-delay: 0.25s; }
.menu-item:nth-child(6) { animation-delay: 0.3s; }
.menu-item:nth-child(7) { animation-delay: 0.35s; }

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>
