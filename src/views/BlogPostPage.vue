<template>
  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Botón de Retroceso -->
    <router-link 
      to="/blog"
      class="inline-flex items-center gap-2 text-primary font-medium mb-8 hover:gap-3 transition-all"
    >
      <span class="material-symbols-outlined">arrow_back</span>
      Volver al blog
    </router-link>

    <!-- Encabezado del Artículo -->
    <article class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-lg border border-[#cfe7d7] dark:border-[#2a4a35]">
      <div class="relative h-96 overflow-hidden">
        <img 
          :src="post.image" 
          :alt="post.title"
          class="w-full h-full object-cover"
        />
      </div>
      
      <div class="p-8 md:p-12">
        <div class="flex items-center gap-4 mb-6">
          <span class="bg-primary text-[#0d1b12] px-4 py-1.5 rounded-lg text-sm font-bold">
            {{ post.category }}
          </span>
          <div class="flex items-center gap-2 text-sm text-[#4c9a66] dark:text-[#a0ccb0]">
            <span class="material-symbols-outlined text-sm">calendar_today</span>
            <time>{{ post.date }}</time>
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
        <router-link 
          v-for="relatedPost in relatedPosts" 
          :key="relatedPost.id"
          :to="`/blog/${relatedPost.id}`"
          class="group bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-[#cfe7d7] dark:border-[#2a4a35]"
        >
          <div class="relative h-40 overflow-hidden">
            <img 
              :src="relatedPost.image" 
              :alt="relatedPost.title"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
            />
          </div>
          <div class="p-5">
            <h3 class="font-bold mb-2 group-hover:text-primary transition-colors">
              {{ relatedPost.title }}
            </h3>
            <p class="text-sm text-[#4c9a66] dark:text-[#a0ccb0]">{{ relatedPost.date }}</p>
          </div>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref } from 'vue'

interface BlogPost {
  id: number
  title: string
  excerpt: string
  content: string
  category: string
  date: string
  image: string
}

// En una aplicación real, esto obtendría datos de una API basándose en route.params.id
const post = ref<BlogPost>({
  id: 1,
  title: 'Cómo reducir tu factura de luz hasta un 60% con energía solar',
  excerpt: 'Descubre las claves para maximizar el ahorro en tu factura eléctrica mediante la instalación de paneles solares y sistemas de autoconsumo.',
  category: 'Estilos de vida',
  date: '15 Enero 2026',
  image: 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=1200&h=800&fit=crop',
  content: `
    <h2>La revolución solar en los hogares españoles</h2>
    <p>La energía solar se ha convertido en una de las inversiones más rentables para los hogares españoles. Con el aumento constante de los precios de la electricidad y las mejoras tecnológicas en paneles solares, cada vez más familias están optando por el autoconsumo.</p>
    
    <h3>Beneficios del autoconsumo solar</h3>
    <ul>
      <li><strong>Ahorro inmediato:</strong> Reduce tu factura eléctrica desde el primer día</li>
      <li><strong>Independencia energética:</strong> Menos dependencia de las compañías eléctricas</li>
      <li><strong>Valor añadido:</strong> Aumenta el valor de tu propiedad</li>
      <li><strong>Sostenibilidad:</strong> Reduce tu huella de carbono significativamente</li>
    </ul>

    <h3>Cálculo del ahorro real</h3>
    <p>Una vivienda media en Valencia con un consumo de 300 kWh/mes puede ahorrar entre 150-180€ mensuales con una instalación solar de 3-4 kW. La inversión inicial se amortiza en 5-7 años, y los paneles tienen una vida útil de más de 25 años.</p>

    <h3>Subvenciones disponibles</h3>
    <p>Actualmente existen múltiples ayudas para la instalación de paneles solares, incluyendo las subvenciones Next Generation EU que pueden cubrir hasta el 40% del coste de instalación.</p>
  `
})

const relatedPosts = ref([
  {
    id: 4,
    title: 'Domótica verde: ahorra agua y energía inteligentemente',
    date: '28 Diciembre 2025',
    image: 'https://images.unsplash.com/photo-1558002038-1055907df827?w=800&h=600&fit=crop'
  },
  {
    id: 5,
    title: 'Ayudas para instalación de paneles solares en Valencia',
    date: '20 Diciembre 2025',
    image: 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?w=800&h=600&fit=crop'
  }
])
</script>
