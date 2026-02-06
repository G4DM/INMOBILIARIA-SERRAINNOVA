<template>
  <header class="sticky top-0 z-50 w-full border-b border-solid border-[#e7f3eb] dark:border-[#1a3022] bg-background-light dark:bg-background-dark backdrop-blur-md">
    <div class="flex items-center justify-between max-w-[1200px] mx-auto px-6 lg:px-8 py-4">
      <div class="flex items-center gap-3">
        <img src="../assets/logo.png" alt="SERRAINOVA Logo" class="h-8 w-auto" />
        <h2 class="text-lg font-bold tracking-tight">SERRAINOVA</h2>
      </div>
      
      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center gap-8">
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/">Inicio</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/propiedades">Propiedades</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/quienes-somos">Quiénes Somos</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/servicios">Servicios</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/blog">Blog</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/calculadora">Impacto</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/contacto">Contacto</router-link>
      </nav>

      <!-- Mobile Menu Button -->
      <button 
        @click="toggleMenu"
        class="md:hidden p-2 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] rounded-lg transition-all duration-300 hover:scale-110"
        aria-label="Toggle menu"
      >
        <span class="material-symbols-outlined text-2xl transition-transform duration-300" :class="{ 'rotate-90': isMenuOpen }">
          {{ isMenuOpen ? 'close' : 'menu' }}
        </span>
      </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <Transition name="slide-down">
      <div 
        v-show="isMenuOpen" 
        class="md:hidden border-t border-[#e7f3eb] dark:border-[#1a3022] bg-background-light dark:bg-background-dark overflow-hidden"
      >
        <nav class="flex flex-col max-w-[1200px] mx-auto">
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">home</span>
              Inicio
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/propiedades"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">apartment</span>
              Propiedades
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/quienes-somos"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">groups</span>
              Quiénes Somos
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/servicios"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">handyman</span>
              Servicios
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/blog"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">article</span>
              Blog
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/calculadora"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">eco</span>
              Impacto
            </span>
          </router-link>
          <router-link 
            @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary" 
            to="/contacto"
          >
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">mail</span>
              Contacto
            </span>
          </router-link>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<script setup lang="ts">
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
/* Slide down transition for mobile menu */
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

/* Menu item animation */
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
