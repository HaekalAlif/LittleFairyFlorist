<template>
    <div
        class="testimonial-card bg-red-400 rounded-lg p-6 shadow-md mb-4 last:mb-0"
    >
        <img
            :src="`/storage/${imageSrc}`"
            :alt="customerName || 'Customer image'"
            class="testimonial-image rounded-lg mb-4 object-cover mx-auto"
        />
        <h4 class="text-lg font-semibold text-orange-100 mb-2">
            {{ customerName }}
        </h4>
        <p class="text-orange-100">{{ description }}</p>
    </div>
</template>

<script setup>
defineProps({
    customerName: String,
    imageSrc: String,
    description: String,
});
</script>

<style scoped>
.testimonial-card {
    transition: transform 0.5s;
    width: 100%;
    max-width: 300px;
}

.testimonial-card:hover {
    transform: translateY(10px);
}

.testimonial-image {
    width: 100%;
    height: auto;
    max-height: 40vh; /* Ensure the image scales with the viewport height */
}

@media (max-width: 1024px) {
    .testimonial-card {
        max-width: 250px;
    }
    .testimonial-image {
        max-height: 35vh;
    }
}

@media (max-width: 640px) {
    .testimonial-card {
        max-width: 200px;
    }
    .testimonial-image {
        max-height: 30vh;
    }
}
</style>
