<template>
    <section class="testimonial-section py-14 px-4">
        <h2
            class="text-3xl font-bold text-red-400 uppercase tracking-wide max-w-screen-lg mx-auto text-center"
        >
            Dipercaya oleh Ratusan Pelanggan yang Bahagia
        </h2>
        <p
            class="mt-8 text-lg leading-7 text-center text-red-400 max-w-screen-md mx-auto"
        >
            Kami bangga menjadi bagian dari momen spesial Anda.<br />
            Berikut adalah pengalaman pelanggan kami yang telah merasakan
            keindahan dan makna dalam setiap rangkaian bunga dari Little Fairy
            Florist.
        </p>
        <h2
            class="text-3xl mt-8 font-bold text-red-400 uppercase tracking-wide text-center"
        >
            Testimonial Pelanggan
        </h2>
        <p class="text-3xl text-red-400 mt-4 mb-12 text-center">
            Apa kata pelanggan kami tentang Little Fairy Florist
        </p>

        <div
            v-if="errorMessage"
            class="bg-red-100 text-red-800 p-2 rounded mb-4"
        >
            {{ errorMessage }}
        </div>

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

<script setup>
import { ref, onMounted } from "vue";
import TestimonialCard from "./TestimonialCard.vue";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import $ from "jquery";
import "slick-carousel";

const testimonials = ref([]);
const errorMessage = ref(null);

async function fetchTestimonials() {
    try {
        const response = await fetch("http://127.0.0.1:8000/testimonials", {
            headers: { Accept: "application/json" },
            credentials: "include",
        });

        if (!response.ok) throw new Error("Gagal mengambil data testimonial");
        testimonials.value = await response.json();
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
        errorMessage.value = "Gagal memuat testimonial. Silakan coba lagi.";
    }
}

onMounted(() => {
    fetchTestimonials();

    setTimeout(() => {
        $(".carousel").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: true,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                    },
                },
            ],
        });
    }, 1000);
});
</script>

<style scoped>
.testimonial-section {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    overflow-x: hidden; 
}

.carousel {
    margin: 0 -10px;
}

:deep(.slick-slide) {
    padding: 0 10px;
}

:deep(.slick-slide > div) {
    display: flex;
    justify-content: center;
}

:deep(.slick-prev),
:deep(.slick-next) {
    z-index: 1;
}

:deep(.slick-prev) {
    left: 10px;
}

:deep(.slick-next) {
    right: 10px;
}

.testimonial-card {
    width: 100%;
    max-width: 300px;
}

.testimonial-card img {
    width: 100%;
    height: auto;
}

@media (max-width: 1024px) {
    .testimonial-card {
        max-width: 250px;
    }
}

@media (max-width: 640px) {
    .testimonial-card {
        max-width: 200px;
    }
}
</style>