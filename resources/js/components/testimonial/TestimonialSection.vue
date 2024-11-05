<script setup>
import { ref, onMounted } from "vue";
import TestimonialCard from "./TestimonialCard.vue";

// Slick carousel
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import $ from "jquery";
import "slick-carousel";

// State variables for testimonials and error message
const testimonials = ref([]);
const errorMessage = ref(null);

async function fetchTestimonials() {
    try {
        // Fetch testimonial data from the API
        const response = await fetch("http://127.0.0.1:8000/testimonials", {
            headers: {
                Accept: "application/json",
            },
            credentials: "include",
        });

        if (!response.ok) {
            throw new Error("Gagal mengambil data testimonial");
        }

        // Parse the JSON data from the response
        const data = await response.json();
        testimonials.value = data;
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
        errorMessage.value = "Gagal memuat testimonial. Silakan coba lagi.";
    }
}

// Initialize Slick carousel when the component is mounted
onMounted(() => {
    fetchTestimonials();

    // Initialize Slick.js
    setTimeout(() => {
        $(".carousel").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
        });
    }, 1000);
});
</script>

<template>
    <section class="testimonial-section py-14">
        <header class="text-center mb-10">
            <h2 class="text-3xl font-bold text-red-400 uppercase tracking-wide">
                Testimonial Pelanggan
            </h2>
            <p class="text-red-500 mt-4">
                Apa kata pelanggan kami tentang Little Fairy Florist
            </p>
        </header>

        <!-- Error Message -->
        <div
            v-if="errorMessage"
            class="bg-red-100 text-red-800 p-2 rounded mb-4"
        >
            {{ errorMessage }}
        </div>

        <!-- Slick Carousel -->
        <div class="carousel">
            <TestimonialCard
                v-for="(testimonial, index) in testimonials"
                :key="index"
                :customerName="testimonial.customer_name"
                :imageSrc="testimonial.image_url"
                :description="testimonial.description"
            />
        </div>
    </section>
</template>

<style scoped>
.testimonial-section {
    max-width: 1200px;
    margin: 0 auto;
}

.carousel {
    display: flex;
    gap: 20px;
}
</style>
