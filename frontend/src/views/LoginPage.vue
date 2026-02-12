<template>
    <main
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#f6f8f6] to-[#e7f3eb] dark:from-[#08150d] dark:to-[#0d1b12] py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md w-full space-y-8 bg-white dark:bg-[#152a1c] p-10 rounded-2xl shadow-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
            <div>
                <h2 class="mt-6 text-center text-3xl font-black text-[#0d1b12] dark:text-white">
                    Inicia Sesión en SERRAINOVA
                </h2>
                <p class="mt-2 text-center text-sm text-[#4c9a66] dark:text-[#a0ccb0]">
                    Bienvenido de nuevo a tu portal de ahorro energético
                </p>
            </div>

            <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email-address" class="block text-sm font-bold mb-2">Correo Electrónico</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            v-model="email"
                            class="appearance-none rounded-lg relative block w-full px-4 py-3 border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] text-[#0d1b12] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:z-10 sm:text-sm"
                            placeholder="usuario@email.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-bold mb-2">Contraseña</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            v-model="password"
                            class="appearance-none rounded-lg relative block w-full px-4 py-3 border border-[#cfe7d7] dark:border-[#2a4a35] bg-[#f6f8f6] dark:bg-[#102216] text-[#0d1b12] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:z-10 sm:text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <div v-if="error"
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-sm"
                    role="alert">
                    <span class="block sm:inline">{{ error }}</span>
                </div>

                <div>
                    <button type="submit" :disabled="loading"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-[#0d1b12] bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary disabled:opacity-50 transition-all shadow-lg">
                        <span v-if="loading"
                            class="material-symbols-outlined animate-spin mr-2">progress_activity</span>
                        {{ loading ? 'Iniciando sesión...' : 'Entrar' }}
                    </button>
                </div>
            </form>

            <div class="text-center">
                <router-link to="/" class="text-sm font-medium text-primary hover:text-primary/80 transition-colors">
                    ¿Has olvidado tu contraseña?
                </router-link>
            </div>
        </div>
    </main>
</template>

<script setup>
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'
    import { userStore } from '../store/userStore'

    const router = useRouter()
    const email = ref('')
    const password = ref('')
    const loading = ref(false)
    const error = ref('')

    const handleLogin = async () => {
        try {
            loading.value = true
            error.value = ''

            const response = await fetch('http://localhost:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    email: email.value,
                    password: password.value,
                }),
            })

            const data = await response.json()

            if (!response.ok) {
                throw new Error(data.message || 'Error al iniciar sesión')
            }

            userStore.setSession(data.user, data.access_token)

            // Redirigir según el rol
            if (userStore.isModerator) {
                router.push('/admin')
            } else {
                router.push('/')
            }

        } catch (err) {
            error.value = err.message
            console.error(err)
        } finally {
            loading.value = false
        }
    }
</script>
