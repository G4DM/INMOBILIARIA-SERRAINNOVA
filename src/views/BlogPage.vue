<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-12">
      <h1 class="text-3xl md:text-4xl font-black mb-4">Blog SERRAINOVA</h1>
      <p class="text-[#4c9a66] dark:text-[#a0ccb0] text-lg">
        Actualizaciones sobre estilos de vida ahorrativos, Agenda 2030 y subvenciones ecológicas
      </p>
    </div>

    <!-- Category Filters -->
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

    <!-- Blog Posts Grid -->
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

<script setup lang="ts">
import { ref, computed } from 'vue'

interface BlogPost {
  id: number
  title: string
  excerpt: string
  category: string
  date: string
  image: string
}

const categories = ['Estilos de vida', 'Agenda 2030', 'Subvenciones']
const selectedCategory = ref<string | null>(null)

const posts = ref<BlogPost[]>([
  {
    id: 1,
    title: 'Cómo reducir tu factura de luz hasta un 60% con energía solar',
    excerpt: 'Descubre las claves para maximizar el ahorro en tu factura eléctrica mediante la instalación de paneles solares y sistemas de autoconsumo.',
    category: 'Estilos de vida',
    date: '15 Enero 2026',
    image: 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800&h=600&fit=crop'
  },
  {
    id: 2,
    title: 'Subvenciones Next Generation para rehabilitación energética 2026',
    excerpt: 'Guía completa sobre las ayudas disponibles para mejorar la eficiencia energética de tu vivienda con fondos europeos.',
    category: 'Subvenciones',
    date: '10 Enero 2026',
    image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop'
  },
  {
    id: 3,
    title: 'ODS 11: Ciudades sostenibles y el futuro de la vivienda',
    excerpt: 'Exploramos cómo las viviendas sostenibles contribuyen a los Objetivos de Desarrollo Sostenible de la ONU.',
    category: 'Agenda 2030',
    date: '5 Enero 2026',
    image: 'https://images.unsplash.com/photo-1518005020951-eccb494ad742?w=800&h=600&fit=crop'
  },
  {
    id: 4,
    title: 'Domótica verde: ahorra agua y energía inteligentemente',
    excerpt: 'Las últimas tecnologías en domótica que te ayudan a reducir el consumo de recursos en tu hogar de forma automática.',
    category: 'Estilos de vida',
    date: '28 Diciembre 2025',
    image: 'https://images.unsplash.com/photo-1558002038-1055907df827?w=800&h=600&fit=crop'
  },
  {
    id: 5,
    title: 'Ayudas para instalación de paneles solares en Valencia',
    excerpt: 'Todo lo que necesitas saber sobre las subvenciones autonómicas y municipales para energía solar en la Comunidad Valenciana.',
    category: 'Subvenciones',
    date: '20 Diciembre 2025',
    image: 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?w=800&h=600&fit=crop'
  },
  {
    id: 6,
    title: 'Calefacción eficiente: aerotermia vs biomasa',
    excerpt: 'Comparativa completa de sistemas de calefacción sostenibles para ayudarte a elegir la mejor opción para tu hogar.',
    category: 'Estilos de vida',
    date: '15 Diciembre 2025',
    image: 'https://images.unsplash.com/photo-1545259741-2ea3ebf61fa3?w=800&h=600&fit=crop'
  }
])

const filteredPosts = computed(() => {
  if (selectedCategory.value === null) {
    return posts.value
  }
  return posts.value.filter(post => post.category === selectedCategory.value)
})
</script>
