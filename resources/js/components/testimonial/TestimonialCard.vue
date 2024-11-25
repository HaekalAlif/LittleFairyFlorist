<template>
    <div
        class="testimonial-card bg-red-400 rounded-lg p-6 shadow-md mb-4 last:mb-0"
    >
        <img
            :src="`/storage/${imageSrc}`"
            :alt="customerName || 'Customer image'"
            class="w-64 h-64 rounded-lg mb-4 object-cover mx-auto"
        />
        <h4 class="text-lg font-semibold text-orange-100 mb-2">
            {{ customerName }}
        </h4>
        <p class="text-orange-100">{{ description }}</p>
    </div>
</template>

<script setup>
// Props for dynamic data
defineProps({
    customerName: String,
    imageSrc: String,
    description: String,
});
</script>

<style scoped>
.testimonial-card {
    transition: transform 0.5s;
}

.testimonial-card:hover {
    transform: translateY(10px);
}
</style>
