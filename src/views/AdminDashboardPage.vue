<template>
  <main class="min-h-screen bg-gradient-to-br from-[#f6f8f6] to-[#e7f3eb] dark:from-[#08150d] dark:to-[#0d1b12] py-12 px-6 lg:px-40">
    <div class="max-w-[1400px] mx-auto">
      <div class="mb-8">
        <h1 class="text-4xl font-black mb-2">Panel de Administración</h1>
        <p class="text-lg opacity-70">Gestión de propiedades, blogs y usuarios</p>
      </div>
      
      <!-- Tarjetas de Estadísticas -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
          <span class="material-symbols-outlined text-primary text-3xl">home</span>
          <p class="text-sm font-medium mt-2 opacity-80">Total Propiedades</p>
          <p class="text-3xl font-black mt-1">{{ properties.length }}</p>
        </div>
        <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
          <span class="material-symbols-outlined text-primary text-3xl">article</span>
          <p class="text-sm font-medium mt-2 opacity-80">Total Artículos</p>
          <p class="text-3xl font-black mt-1">{{ blogPosts.length }}</p>
        </div>
        <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
          <span class="material-symbols-outlined text-primary text-3xl">group</span>
          <p class="text-sm font-medium mt-2 opacity-80">Total Usuarios</p>
          <p class="text-3xl font-black mt-1">{{ users.length }}</p>
        </div>
        <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
          <span class="material-symbols-outlined text-primary text-3xl">visibility</span>
          <p class="text-sm font-medium mt-2 opacity-80">Propiedades Visibles</p>
          <p class="text-3xl font-black mt-1">{{ visibleProperties }}</p>
        </div>
      </div>

      <!-- Botones de Navegación -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Gestión de Propiedades -->
        <router-link 
          to="/admin/propiedades"
          class="bg-white dark:bg-[#152a1c] p-8 rounded-xl border-2 border-[#cfe7d7] dark:border-[#2a4a35] hover:border-primary dark:hover:border-primary transition-all group"
        >
          <div class="flex flex-col items-center text-center">
            <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all">
              <span class="material-symbols-outlined text-primary text-5xl">home_work</span>
            </div>
            <h3 class="text-2xl font-bold mb-2">Gestión de Propiedades</h3>
            <p class="opacity-70 mb-4">Administra, edita y oculta propiedades</p>
            <div class="flex items-center gap-2 text-primary font-bold">
              <span>Ir a Propiedades</span>
              <span class="material-symbols-outlined">arrow_forward</span>
            </div>
          </div>
        </router-link>

        <!-- Gestión de Blogs -->
        <router-link 
          to="/admin/blogs"
          class="bg-white dark:bg-[#152a1c] p-8 rounded-xl border-2 border-[#cfe7d7] dark:border-[#2a4a35] hover:border-primary dark:hover:border-primary transition-all group"
        >
          <div class="flex flex-col items-center text-center">
            <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all">
              <span class="material-symbols-outlined text-primary text-5xl">article</span>
            </div>
            <h3 class="text-2xl font-bold mb-2">Gestión de Blogs</h3>
            <p class="opacity-70 mb-4">Crea, edita y gestiona artículos del blog</p>
            <div class="flex items-center gap-2 text-primary font-bold">
              <span>Ir a Blogs</span>
              <span class="material-symbols-outlined">arrow_forward</span>
            </div>
          </div>
        </router-link>

        <!-- Gestión de Usuarios -->
        <router-link 
          to="/admin/usuarios"
          class="bg-white dark:bg-[#152a1c] p-8 rounded-xl border-2 border-[#cfe7d7] dark:border-[#2a4a35] hover:border-primary dark:hover:border-primary transition-all group"
        >
          <div class="flex flex-col items-center text-center">
            <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all">
              <span class="material-symbols-outlined text-primary text-5xl">manage_accounts</span>
            </div>
            <h3 class="text-2xl font-bold mb-2">Gestión de Usuarios</h3>
            <p class="opacity-70 mb-4">Administra usuarios y permisos</p>
            <div class="flex items-center gap-2 text-primary font-bold">
              <span>Ir a Usuarios</span>
              <span class="material-symbols-outlined">arrow_forward</span>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue'
import { properties as importedProperties } from '../data/properties'
import { users as importedUsers } from '../data/users'
import { blogPosts as importedBlogPosts } from '../data/blogPosts'

// Estado reactivo para estadísticas
const properties = ref([...importedProperties])
const users = ref([...importedUsers])
const blogPosts = ref([...importedBlogPosts])

// Estadísticas computadas
const visibleProperties = computed(() => 
  properties.value.filter(p => !p.hidden).length
)
</script>
