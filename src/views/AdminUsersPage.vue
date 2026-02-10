<template>
  <main class="min-h-screen bg-gradient-to-br from-[#f6f8f6] to-[#e7f3eb] dark:from-[#08150d] dark:to-[#0d1b12] py-12 px-6 lg:px-40">
    <div class="max-w-[1400px] mx-auto">
      <!-- Header -->
      <div class="mb-8">
        <router-link to="/admin" class="text-primary hover:underline mb-2 inline-block">← Volver al Panel</router-link>
        <h1 class="text-4xl font-black">Gestión de Usuarios</h1>
        <p class="text-lg opacity-70 mt-2">{{ users.length }} usuarios en total</p>
      </div>

      <!-- Buscador -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-6 mb-8 border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-bold mb-2">Buscar por nombre</label>
            <input 
              v-model="searchName"
              type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              placeholder="Ej: María..."
            />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Buscar por email</label>
            <input 
              v-model="searchEmail"
              type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
              placeholder="Ej: usuario@email.com..."
            />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Rol</label>
            <select 
              v-model="searchRole"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
            >
              <option value="">Todos</option>
              <option value="Admin">Admin</option>
              <option value="Usuario">Usuario</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Tabla de Usuarios -->
      <div class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden border border-[#cfe7d7] dark:border-[#2a4a35]">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-[#e7f3eb] dark:bg-[#1a3022]">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Rol</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Fecha de Registro</th>
                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Acciones</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#e7f3eb] dark:divide-[#1a3022]">
              <tr 
                v-for="user in filteredUsers" 
                :key="user.id"
                class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors"
              >
                <td class="px-6 py-4 font-mono text-sm">{{ user.id }}</td>
                <td class="px-6 py-4 font-medium">{{ user.name }}</td>
                <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">{{ user.email }}</td>
                <td class="px-6 py-4">
                  <span 
                    class="px-2 py-1 rounded text-xs font-medium"
                    :class="user.role === 'Admin' 
                      ? 'bg-primary/20 text-primary' 
                      : 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'"
                  >
                    {{ user.role }}
                  </span>
                </td>
                <td class="px-6 py-4">{{ user.registrationDate }}</td>
                <td class="px-6 py-4">
                  <div class="flex gap-2">
                    <button
                      @click="editUser(user)"
                      class="px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 rounded-lg font-medium transition-all text-sm flex items-center gap-1"
                    >
                      <span class="material-symbols-outlined text-sm">edit</span>
                      Editar
                    </button>
                    <button
                      @click="confirmDeleteUser(user)"
                      class="px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 dark:bg-red-900/30 dark:text-red-400 rounded-lg font-medium transition-all text-sm flex items-center gap-1"
                    >
                      <span class="material-symbols-outlined text-sm">delete</span>
                      Eliminar
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal de Edición de Usuario -->
    <div 
      v-if="showEditModal"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
      @click.self="closeEditModal"
    >
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 max-w-md w-full border border-[#cfe7d7] dark:border-[#2a4a35]">
        <h3 class="text-2xl font-bold mb-6">Editar Usuario</h3>
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-bold mb-2">Nombre</label>
            <input 
              v-model="editingUser.name"
              type="text"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
            />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Email</label>
            <input 
              v-model="editingUser.email"
              type="email"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
            />
          </div>
          <div>
            <label class="block text-sm font-bold mb-2">Rol</label>
            <select 
              v-model="editingUser.role"
              class="w-full px-4 py-3 rounded-lg border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] focus:ring-2 focus:ring-primary"
            >
              <option value="Usuario">Usuario</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="flex gap-3 mt-6">
          <button
            @click="saveUser"
            class="flex-1 bg-primary hover:bg-primary/90 text-[#0d1b12] font-bold py-3 rounded-lg transition-all"
          >
            Guardar Cambios
          </button>
          <button
            @click="closeEditModal"
            class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 font-bold py-3 rounded-lg transition-all"
          >
            Cancelar
          </button>
        </div>
      </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div 
      v-if="showDeleteModal"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
      @click.self="closeDeleteModal"
    >
      <div class="bg-white dark:bg-[#152a1c] rounded-xl p-8 max-w-md w-full border border-[#cfe7d7] dark:border-[#2a4a35]">
        <h3 class="text-2xl font-bold mb-4">Confirmar Eliminación</h3>
        <p class="mb-6">¿Estás seguro de que deseas eliminar al usuario <strong>{{ userToDelete?.name }}</strong>? Esta acción no se puede deshacer.</p>
        <div class="flex gap-3">
          <button
            @click="deleteUser"
            class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition-all"
          >
            Eliminar
          </button>
          <button
            @click="closeDeleteModal"
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
import { users as importedUsers } from '../data/users'

// Estado reactivo
const users = ref([...importedUsers])

// Buscador
const searchName = ref('')
const searchEmail = ref('')
const searchRole = ref('')

// Usuarios filtrados
const filteredUsers = computed(() => {
  return users.value.filter(user => {
    const matchesName = user.name.toLowerCase().includes(searchName.value.toLowerCase())
    const matchesEmail = user.email.toLowerCase().includes(searchEmail.value.toLowerCase())
    const matchesRole = searchRole.value === '' || user.role === searchRole.value
    
    return matchesName && matchesEmail && matchesRole
  })
})

// Modales
const showEditModal = ref(false)
const showDeleteModal = ref(false)
const editingUser = ref({})
const userToDelete = ref(null)

// Funciones de gestión de usuarios
const editUser = (user) => {
  editingUser.value = { ...user }
  showEditModal.value = true
}

const saveUser = () => {
  const index = users.value.findIndex(u => u.id === editingUser.value.id)
  if (index !== -1) {
    users.value[index] = { ...editingUser.value }
  }
  closeEditModal()
}

const closeEditModal = () => {
  showEditModal.value = false
  editingUser.value = {}
}

const confirmDeleteUser = (user) => {
  userToDelete.value = user
  showDeleteModal.value = true
}

const deleteUser = () => {
  const index = users.value.findIndex(u => u.id === userToDelete.value.id)
  if (index !== -1) {
    users.value.splice(index, 1)
  }
  closeDeleteModal()
}

const closeDeleteModal = () => {
  showDeleteModal.value = false
  userToDelete.value = null
}
</script>
