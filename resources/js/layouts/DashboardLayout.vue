<template>
    <div class="flex h-screen overflow-hidden">
        <div class="sidebar">
            <SidebarContent />
        </div>
        <main class="flex-1 overflow-y-auto bg-gray-100">
            <slot></slot>
        </main>
    </div>
</template>

<script setup>
import SidebarContent from "../components/SidebarContent.vue";
</script>

<style scoped>

main {
    height: 100vh; 
    overflow-y: auto; 
}
</style>
