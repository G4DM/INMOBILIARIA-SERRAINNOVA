<template>
  <header
    class="sticky top-0 z-50 w-full border-b border-solid border-[#e7f3eb] dark:border-[#1a3022] bg-background-light dark:bg-background-dark backdrop-blur-md">
    <div class="flex items-center justify-between max-w-[1200px] mx-auto px-6 lg:px-8 py-4">
      <div class="flex items-center gap-3">
        <img src="../assets/logo.png" alt="SERRAINOVA Logo" class="h-8 w-auto" />
        <h2 class="text-lg font-bold tracking-tight">SERRAINOVA</h2>
      </div>

      <!-- Navegación de Escritorio -->
      <nav class="hidden md:flex items-center gap-8 text-[#0d1b12] dark:text-white">
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/">Inicio</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors"
          to="/propiedades">Propiedades</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/quienes-somos">Quiénes
          Somos</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors"
          to="/servicios">Servicios</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors" to="/blog">Blog</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors"
          to="/calculadora">Impacto</router-link>
        <router-link class="text-sm font-medium hover:text-primary transition-colors"
          to="/contacto">Contacto</router-link>

        <!-- Admin Link (Only for Moderators) -->
        <router-link v-if="userStore.isModerator"
          class="text-sm font-medium hover:text-primary transition-colors bg-primary/10 px-3 py-1.5 rounded-lg"
          to="/admin">Administrador</router-link>

        <!-- Auth Buttons -->
        <router-link v-if="!userStore.isAuthenticated"
          class="text-sm font-bold bg-[#0d1b12] dark:bg-white text-white dark:text-[#0d1b12] px-4 py-2 rounded-lg hover:scale-105 transition-all"
          to="/login">Login</router-link>

        <button v-else @click="handleLogout"
          class="text-sm font-bold border-2 border-[#0d1b12] dark:border-white px-4 py-2 rounded-lg hover:bg-[#0d1b12] hover:text-white dark:hover:bg-white dark:hover:text-[#0d1b12] transition-all">Cerrar
          Sesión</button>
      </nav>

      <!-- Botón de Menú Móvil -->
      <button @click="toggleMenu"
        class="md:hidden p-2 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] rounded-lg transition-all duration-300 hover:scale-110"
        aria-label="Toggle menu">
        <span class="material-symbols-outlined text-2xl transition-transform duration-300"
          :class="{ 'rotate-90': isMenuOpen }">
          {{ isMenuOpen ? 'close' : 'menu' }}
        </span>
      </button>
    </div>

    <!-- Menú de Navegación Móvil -->
    <Transition name="slide-down">
      <div v-show="isMenuOpen"
        class="md:hidden border-t border-[#e7f3eb] dark:border-[#1a3022] bg-background-light dark:bg-background-dark overflow-hidden">
        <nav class="flex flex-col max-w-[1200px] mx-auto">
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">home</span>
              Inicio
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/propiedades">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">apartment</span>
              Propiedades
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/quienes-somos">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">groups</span>
              Quiénes Somos
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/servicios">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">handyman</span>
              Servicios
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/blog">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">article</span>
              Blog
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/calculadora">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">eco</span>
              Impacto
            </span>
          </router-link>
          <router-link @click="closeMenu"
            class="menu-item py-4 px-6 text-sm font-medium transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary"
            to="/contacto">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">mail</span>
              Contacto
            </span>
          </router-link>
          <router-link @click="closeMenu" v-if="userStore.isModerator"
            class="menu-item py-4 px-6 text-sm font-medium border-b border-[#e7f3eb] dark:border-[#1a3022] transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 hover:text-primary bg-primary/10"
            to="/admin">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">admin_panel_settings</span>
              Administrador
            </span>
          </router-link>

          <router-link @click="closeMenu" v-if="!userStore.isAuthenticated"
            class="menu-item py-4 px-6 text-sm font-bold transition-all duration-300 hover:bg-[#e7f3eb] dark:hover:bg-[#1a3022] hover:pl-8 text-primary"
            to="/login">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">login</span>
              Iniciar Sesión
            </span>
          </router-link>

          <button @click="handleLogoutMobile" v-else
            class="menu-item py-4 px-6 text-sm font-bold transition-all duration-300 hover:bg-red-50 dark:hover:bg-red-900/10 hover:pl-8 text-red-600 dark:text-red-400 text-left">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">logout</span>
              Cerrar Sesión
            </span>
          </button>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<script setup>
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  import { userStore } from '../store/userStore'

  const router = useRouter()
  const isMenuOpen = ref(false)

  const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value
  }

  const closeMenu = () => {
    isMenuOpen.value = false
  }

  const handleLogout = async () => {
    try {
      // Opcional: llamar a la API de logout
      await fetch('http://localhost:8000/api/logout', {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${userStore.token}`,
          'Accept': 'application/json',
        }
      })
    } catch (err) {
      console.error('Error logging out:', err)
    } finally {
      userStore.clearSession()
      router.push('/')
    }
  }

  const handleLogoutMobile = () => {
    closeMenu()
    handleLogout()
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

  .menu-item:nth-child(1) {
    animation-delay: 0.05s;
  }

  .menu-item:nth-child(2) {
    animation-delay: 0.1s;
  }

  .menu-item:nth-child(3) {
    animation-delay: 0.15s;
  }

  .menu-item:nth-child(4) {
    animation-delay: 0.2s;
  }

  .menu-item:nth-child(5) {
    animation-delay: 0.25s;
  }

  .menu-item:nth-child(6) {
    animation-delay: 0.3s;
  }

  .menu-item:nth-child(7) {
    animation-delay: 0.35s;
  }

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
