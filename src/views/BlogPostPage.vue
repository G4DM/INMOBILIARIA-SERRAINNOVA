<template>
  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Botón de Retroceso -->
    <router-link to="/blog"
      class="inline-flex items-center gap-2 text-primary font-medium mb-8 hover:gap-3 transition-all">
      <span class="material-symbols-outlined">arrow_back</span>
      Volver al blog
    </router-link>

    <!-- Estado de Carga -->
    <div v-if="loading" class="text-center py-12">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto mb-4"></div>
      <p class="text-lg text-[#4c9a66] dark:text-[#a0ccb0]">Cargando artículo...</p>
    </div>

    <!-- Error / No Encontrado -->
    <div v-else-if="error || !post" class="text-center py-12">
      <span class="material-symbols-outlined text-6xl text-[#4c9a66] dark:text-[#a0ccb0] mb-4">article_shortcut</span>
      <p class="text-xl font-bold mb-2">Artículo no encontrado</p>
      <router-link to="/blog" class="text-primary hover:underline">Volver al blog</router-link>
    </div>

    <!-- Encabezado del Artículo -->
    <article v-else
      class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-lg border border-[#cfe7d7] dark:border-[#2a4a35]">
      <div class="relative h-96 overflow-hidden">
        <img :src="post.image" :alt="post.title" class="w-full h-full object-cover" />
      </div>

      <div class="p-8 md:p-12">
        <div class="flex items-center gap-4 mb-6">
          <span class="bg-primary text-[#0d1b12] px-4 py-1.5 rounded-lg text-sm font-bold">
            {{ post.category }}
          </span>
          <div class="flex items-center gap-2 text-sm text-[#4c9a66] dark:text-[#a0ccb0]">
            <span class="material-symbols-outlined text-sm">calendar_today</span>
            <time>{{ formatDate(post.date) }}</time>
          </div>
        </div>

        <h1 class="text-3xl md:text-4xl font-black mb-6">{{ post.title }}</h1>

        <div class="prose prose-lg dark:prose-invert max-w-none">
          <p class="text-lg text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed mb-6">
            {{ post.excerpt }}
          </p>

          <div v-html="post.content" class="text-[#4c9a66] dark:text-[#a0ccb0] leading-relaxed space-y-4"></div>
        </div>
      </div>
    </article>

    <!-- Artículos Relacionados -->
    <div class="mt-16">
      <h2 class="text-2xl font-bold mb-6">Artículos relacionados</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <router-link v-for="relatedPost in relatedPosts" :key="relatedPost.id" :to="`/blog/${relatedPost.id}`"
          class="group bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-[#cfe7d7] dark:border-[#2a4a35]">
          <div class="relative h-40 overflow-hidden">
            <img :src="relatedPost.image" :alt="relatedPost.title"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
          </div>
          <div class="p-5">
            <h3 class="font-bold mb-2 group-hover:text-primary transition-colors">
              {{ relatedPost.title }}
            </h3>
            <p class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">{{ formatDate(relatedPost.date) }}</p>
          </div>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script setup>
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'
  import { formatDate } from '../utils/formatters'

  const route = useRoute()
  const post = ref(null)
  const relatedPosts = ref([])
  const loading = ref(true)
  const error = ref(null)

  const fetchPost = async () => {
    try {
      loading.value = true
      const id = route.params.id
      const response = await fetch(`http://localhost:8000/api/articles/${id}`)
      if (!response.ok) throw new Error('Artículo no encontrado')
      post.value = await response.json()

      // En una aplicación real, esto también podría ser una llamada a la API
      // Para este demo, usaremos algunos posts estáticos o una llamada filtrada
      const allResponse = await fetch('http://localhost:8000/api/articles')
      const allPosts = await allResponse.json()
      relatedPosts.value = allPosts.filter(p => p.id != id).slice(0, 2)
    } catch (err) {
      error.value = err.message
      console.error(err)
    } finally {
      loading.value = false
    }
  }

  onMounted(fetchPost)
</script>
