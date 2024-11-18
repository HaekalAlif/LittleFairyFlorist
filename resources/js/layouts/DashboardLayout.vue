<!-- src/layouts/DashboardLayout.vue -->
<template>
    <div class="flex">
        <SidebarContent />
        <main class="flex-1 -ml-[65px] bg-gray-100">
            <slot></slot>
            <!-- Pastikan slot ini ada untuk menampilkan konten -->
        </main>
    </div>
</template>

<script setup>
import SidebarContent from "../components/SidebarContent.vue";
</script>

<style scoped>
/* Tambahan styling jika diperlukan */
</style>
