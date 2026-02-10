<template>
  <main class="min-h-screen bg-gradient-to-br from-[#f6f8f6] to-[#e7f3eb] dark:from-[#08150d] dark:to-[#0d1b12] py-12 px-6 lg:px-40">
    <div class="max-w-[1400px] mx-auto">
      <!-- Header -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <router-link to="/admin" class="text-primary hover:underline mb-2 inline-block">← Volver al Panel</router-link>
          <h1 class="text-4xl font-black">Gestión de Artículos del Blog</h1>
          <p class="text-lg opacity-70 mt-2">{{ blogPosts.length }} artículos en total</p>
        </div>
        <button
          @click="openAddBlogModal"
          class="bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold px-6 py-3 rounded-lg transition-all flex items-center gap-2"
        >
          <span class="material-symbols-outlined">add</span>
          Añadir Artículo
        </button>
      </div>

      <!-- Buscador -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-6 mb-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-bold mb-2">Buscar por título</label>
            <input 
              v-model="searchQuery"
              type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              placeholder="Ej: Energía solar..."
            />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Categoría</label>
            <select 
              v-model="searchCategory"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
            >
              <option value="">Todas</option>
              <option value="Estilos de vida">Estilos de vida</option>
              <option value="Agenda 2030">Agenda 2030</option>
              <option value="Subvenciones">Subvenciones</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Tabla de Blogs -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-[#e7f3eb] dark:bg-[#1a3022]">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Imagen</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Título</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Categoría</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Fecha</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Acciones</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#e7f3eb] dark:divide-[#1a3022]">
              <tr 
                v-for="post in filteredBlogPosts" 
                :key="post.id"
                class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors"
                :class="{ 'opacity-50': post.hidden }"
              >
                <td class="px-6 py-4">
                  <img :src="post.image" :alt="post.title" class="w-16 h-16 object-cover rounded-lg"/>
                </td>
                <td class="px-6 py-4 font-medium max-w-xs">{{ post.title }}</td>
                <td class="px-6 py-4">
                  <span class="px-2 py-1 bg-primary/20 text-primary rounded text-xs font-medium">
                    {{ post.category }}
                  </span>
                </td>
                <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">{{ post.date }}</td>
                <td class="px-6 py-4">
                  <span 
                    v-if="post.hidden"
                    class="text-red-600 dark:text-red-400 font-medium flex items-center gap-1"
                  >
                    <span class="material-symbols-outlined text-sm">visibility_off</span>
                    Oculto
                  </span>
                  <span 
                    v-else
                    class="text-primary font-medium flex items-center gap-1"
                  >
                    <span class="material-symbols-outlined text-sm">visibility</span>
                    Visible
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex gap-2">
                    <button
                      @click="editBlogPost(post)"
                      class="px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 rounded-lg font-medium transition-all text-sm flex items-center gap-1"
                    >
                      <span class="material-symbols-outlined text-sm">edit</span>
                      Editar
                    </button>
                    <button
                      @click="toggleBlogVisibility(post.id)"
                      class="px-3 py-1.5 rounded-lg font-medium transition-all text-sm"
                      :class="post.hidden 
                        ? 'bg-primary hover:bg-primary/90 text-[#0d1b12]' 
                        : 'bg-red-100 hover:bg-red-200 text-red-700 dark:bg-red-900/30 dark:text-red-400'"
                    >
                      {{ post.hidden ? 'Mostrar' : 'Ocultar' }}
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal de Formulario de Blog (Añadir/Editar) -->
    <div 
      v-if="showBlogModal"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4 overflow-y-auto"
      @click.self="closeBlogModal"
    >
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 max-w-2xl w-full border border-[#cfe7d7] dark:border-[#2a4a35] my-8">
        <h3 class="text-2xl font-bold mb-6">{{ isEditingBlog ? 'Editar Artículo' : 'Añadir Nuevo Artículo' }}</h3>
        <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">
          <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Título</label>
              <input 
                v-model="editingBlog.title"
                type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: Cómo reducir tu factura de luz..."
              />
            </div>
            
            <div>
              <label class="block text-sm font-bold mb-2">Categoría</label>
              <select 
                v-model="editingBlog.category"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              >
                <option value="Estilos de vida">Estilos de vida</option>
                <option value="Agenda 2030">Agenda 2030</option>
                <option value="Subvenciones">Subvenciones</option>
              </select>
            </div>
            
            <div>
              <label class="block text-sm font-bold mb-2">Fecha</label>
              <input 
                v-model="editingBlog.date"
                type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Ej: 15 Enero 2026"
              />
            </div>
            
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">URL de Imagen</label>
              <input 
                v-model="editingBlog.image"
                type="text"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="https://images.unsplash.com/..."
              />
            </div>
            
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Extracto</label>
              <textarea 
                v-model="editingBlog.excerpt"
                rows="2"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Breve descripción del artículo..."
              ></textarea>
            </div>
            
            <div class="col-span-2">
              <label class="block text-sm font-bold mb-2">Contenido</label>
              <textarea 
                v-model="editingBlog.content"
                rows="4"
                class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
                placeholder="Contenido completo del artículo..."
              ></textarea>
            </div>
          </div>
        </div>
        <div class="flex gap-3 mt-6">
          <button
            @click="saveBlogPost"
            class="flex-1 bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-3 rounded-lg transition-all"
          >
            {{ isEditingBlog ? 'Guardar Cambios' : 'Añadir Artículo' }}
          </button>
          <button
            @click="closeBlogModal"
            class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 font-bold py-3 rounded-lg transition-all"
          >
            Cancelar
          </button>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue'
import { blogPosts as importedBlogPosts } from '../data/blogPosts'

// Estado reactivo
const blogPosts = ref([...importedBlogPosts])

// Buscador
const searchQuery = ref('')
const searchCategory = ref('')

// Blogs filtrados
const filteredBlogPosts = computed(() => {
  return blogPosts.value.filter(post => {
    const matchesTitle = post.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesCategory = searchCategory.value === '' || post.category === searchCategory.value
    
    return matchesTitle && matchesCategory
  })
})

// Modales de blogs
const showBlogModal = ref(false)
const editingBlog = ref({})
const isEditingBlog = ref(false)

// Plantilla de blog vacío
const emptyBlog = () => ({
  id: 0,
  title: '',
  excerpt: '',
  category: 'Estilos de vida',
  date: new Date().toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' }),
  image: '',
  content: '',
  hidden: false
})

// Funciones de gestión de blogs
const openAddBlogModal = () => {
  editingBlog.value = emptyBlog()
  isEditingBlog.value = false
  showBlogModal.value = true
}

const editBlogPost = (post) => {
  editingBlog.value = { ...post }
  isEditingBlog.value = true
  showBlogModal.value = true
}

const saveBlogPost = () => {
  if (isEditingBlog.value) {
    // Editar artículo existente
    const index = blogPosts.value.findIndex(p => p.id === editingBlog.value.id)
    if (index !== -1) {
      blogPosts.value[index] = { ...editingBlog.value }
    }
  } else {
    // Añadir nuevo artículo
    const newId = Math.max(...blogPosts.value.map(p => p.id), 0) + 1
    editingBlog.value.id = newId
    blogPosts.value.push({ ...editingBlog.value })
  }
  closeBlogModal()
}

const closeBlogModal = () => {
  showBlogModal.value = false
  editingBlog.value = {}
  isEditingBlog.value = false
}

const toggleBlogVisibility = (postId) => {
  const post = blogPosts.value.find(p => p.id === postId)
  if (post) {
    post.hidden = !post.hidden
  }
}
</script>
