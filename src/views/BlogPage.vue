<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado -->
    <div class="mb-12">
      <h1 class="text-3xl md:text-4xl font-black mb-4">Blog SERRAINOVA</h1>
      <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-lg">
        Actualizaciones sobre estilos de vida ahorrativos, Agenda 2030 y subvenciones ecológicas
      </p>
    </div>

    <!-- Filtros de Categoría -->
    <div class="flex flex-wrap gap-3 mb-8">
      <button 
        @click="selectedCategory = null"
        :class="selectedCategory === null ? 'bg-primary text-[#0d1b12]' : 'bg-white dark:bg-[#152a1c] border border-[#cfe7d7] dark:border-[#2a4a35]'"
        class="px-4 py-2 rounded-lg font-medium transition-all hover:shadow-md"
      >
        Todos
      </button>
      <button 
        v-for="category in categories" 
        :key="category"
        @click="selectedCategory = category"
        :class="selectedCategory === category ? 'bg-primary text-[#0d1b12]' : 'bg-white dark:bg-[#152a1c] border border-[#cfe7d7] dark:border-[#2a4a35]'"
        class="px-4 py-2 rounded-lg font-medium transition-all hover:shadow-md"
      >
        {{ category }}
      </button>
    </div>

    <!-- Cuadrícula de Artículos del Blog -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <article 
        v-for="post in filteredPosts" 
        :key="post.id"
        class="group bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-[#cfe7d7] dark:border-[#2a4a35]"
      >
        <div class="relative h-48 overflow-hidden">
          <img 
            :src="post.image" 
            :alt="post.title"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
          />
          <div class="absolute top-4 left-4">
            <span class="bg-primary text-[#0d1b12] px-3 py-1 rounded-lg text-xs font-bold">
              {{ post.category }}
            </span>
          </div>
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 text-sm text-[#4c9a66] dark:text-[#a0ccb0] mb-3">
            <span class="material-symbols-outlined text-sm">calendar_today</span>
            <time>{{ post.date }}</time>
          </div>
          <h2 class="text-xl font-bold mb-3 group-hover:text-primary transition-colors">
            {{ post.title }}
          </h2>
          <p class="text-[#4c9a66] dark:text-[#a0ccb0] mb-4 line-clamp-3">
            {{ post.excerpt }}
          </p>
          <router-link 
            :to="`/blog/${post.id}`"
            class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all"
          >
            Leer más <span class="material-symbols-outlined text-lg">arrow_forward</span>
          </router-link>
        </div>
      </article>
    </div>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue'
import { blogPosts as importedBlogPosts, blogCategories } from '../data/blogPosts'

const categories = blogCategories
const selectedCategory = ref(null)

const posts = ref([...importedBlogPosts])

const filteredPosts = computed(() => {
  // Filtrar blogs ocultos y por categoría
  return posts.value.filter(post => {
    if (post.hidden) return false
    if (selectedCategory.value === null) return true
    return post.category === selectedCategory.value
  })
})
</script>
