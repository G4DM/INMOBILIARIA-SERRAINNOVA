<template>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
      <h1 class="text-3xl font-black mb-2">Panel de Administración</h1>
      <p class="text-[#4c9a66] dark:text-[#a0ccb0]">Gestión de propiedades sostenibles</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
        <span class="material-symbols-outlined text-primary text-3xl">home</span>
        <p class="text-sm font-medium mt-2 opacity-80">Total Propiedades</p>
        <p class="text-3xl font-black mt-1">124</p>
      </div>
      <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
        <span class="material-symbols-outlined text-primary text-3xl">sell</span>
        <p class="text-sm font-medium mt-2 opacity-80">Vendidas Este Mes</p>
        <p class="text-3xl font-black mt-1">12</p>
      </div>
      <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
        <span class="material-symbols-outlined text-primary text-3xl">eco</span>
        <p class="text-sm font-medium mt-2 opacity-80">Calificación A</p>
        <p class="text-3xl font-black mt-1">68</p>
      </div>
      <div class="bg-white dark:bg-[#152a1c] p-6 rounded-xl border border-[#cfe7d7] dark:border-[#2a4a35]">
        <span class="material-symbols-outlined text-primary text-3xl">trending_up</span>
        <p class="text-sm font-medium mt-2 opacity-80">Valor Promedio</p>
        <p class="text-3xl font-black mt-1">725k€</p>
      </div>
    </div>
    
    <!-- Properties Table -->
    <div class="bg-white dark:bg-[#152a1c] rounded-xl overflow-hidden border border-[#cfe7d7] dark:border-[#2a4a35]">
      <div class="p-6 border-b border-[#e7f3eb] dark:border-[#1a3022]">
        <h2 class="text-xl font-bold">Propiedades Recientes</h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-[#e7f3eb] dark:bg-[#1a3022]">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Propiedad</th>
              <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Ubicación</th>
              <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Calificación</th>
              <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Precio</th>
              <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#e7f3eb] dark:divide-[#1a3022]">
            <tr class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors">
              <td class="px-6 py-4 font-medium">Villa Solar Pasiva Moderna</td>
              <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">Valencia</td>
              <td class="px-6 py-4"><span class="bg-[#059669] text-white px-2 py-1 rounded text-xs font-bold">A</span></td>
              <td class="px-6 py-4 font-bold">895.000€</td>
              <td class="px-6 py-4"><span class="text-primary font-medium">Disponible</span></td>
            </tr>
            <tr class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors">
              <td class="px-6 py-4 font-medium">Refugio Sostenible</td>
              <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">Valencia</td>
              <td class="px-6 py-4"><span class="bg-[#10b981] text-white px-2 py-1 rounded text-xs font-bold">B</span></td>
              <td class="px-6 py-4 font-bold">620.000€</td>
              <td class="px-6 py-4"><span class="text-primary font-medium">Disponible</span></td>
            </tr>
            <tr class="hover:bg-[#f6f8f6] dark:hover:bg-[#102216] transition-colors">
              <td class="px-6 py-4 font-medium">Complejo de Lofts Eco-Urbanos</td>
              <td class="px-6 py-4 text-[#4c9a66] dark:text-[#a0ccb0]">Valencia</td>
              <td class="px-6 py-4"><span class="bg-[#059669] text-white px-2 py-1 rounded text-xs font-bold">A</span></td>
              <td class="px-6 py-4 font-bold">540.000€</td>
              <td class="px-6 py-4"><span class="text-yellow-600 font-medium">Reservado</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
</script>
