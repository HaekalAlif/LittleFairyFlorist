<script setup>
import ProductCard from "./ProductCard.vue";
import { ref, onMounted } from "vue";

// State variables for storing products and error message
const products = ref([]);
const errorMessage = ref(null);

async function fetchProducts() {
    try {
        // Fetch product data from the API
        const response = await fetch("http://127.0.0.1:8000/products", {
            headers: {
                Accept: "application/json",
            },
            credentials: "include",
        });

        if (!response.ok) {
            throw new Error("Gagal mengambil data produk");
        }

        // Parse the JSON data from the response
        const data = await response.json();
        products.value = data;
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
        errorMessage.value = "Gagal memuat produk. Silakan coba lagi.";
    }
}

// Fetch products when the component is mounted
onMounted(() => {
    fetchProducts();
});
</script>

<template>
    <section class="product-section bg-orange-100 py-14 pt-24">
        <header class="text-center">
            <h2 class="text-base font-bold leading-none text-red-400 uppercase tracking-[3px] mb-6">
                PRODUK KAMI
            </h2>
            <h1 class="text-5xl font-bold tracking-tighter leading-none text-red-400 max-md:text-4xl">
                Little Fairy Florist
            </h1>
        </header>

        <div class="container mx-auto px-16 mt-10 max-md:px-5 max-md:mt-10">
            <div class="bg-red-400 rounded-2xl px-16 max-md:px-5">
                <div class="flex gap-5 max-md:flex-col">
                    <div class="w-[57%] max-md:w-full">
                        <div class="text-white my-auto mt-16">
                            <p class="text-2xl leading-tight max-md:max-w-full">
                                Pilihan Terbaik Online untuk Bucket Bunga
                            </p>
                            <h2 class="mt-5 mr-6 text-6xl font-bold max-md:mr-2.5 max-md:max-w-full max-md:text-4xl">
                                LITTLE FAIRY FLORIST
                            </h2>
                            <p class="mt-11 text-3xl font-medium max-md:mt-10 max-md:max-w-full">
                                Untuk Momen dan Orang Spesial di Hidup Anda
                            </p>
                        </div>
                    </div>
                    <div class="w-[43%] max-md:w-full">
                        <img
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/41df0c3a3eec6d1048f9ab1832df97cfc4f282d36912e6b8f836e6f547380181?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb"
                            alt="Decorative floral arrangement"
                            class="w-full object-contain aspect-[1.61] rounded-none"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>

            <h3 class="mt-14 text-2xl font-bold leading-none text-red-400 max-md:mt-10 max-md:max-w-full">
                <span class="font-medium">Dapatkan penawaran terbaik untuk</span>
                Bucket bunga
            </h3>

            <!-- Error Message -->
            <div v-if="errorMessage" class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ errorMessage }}
            </div>

            <div class="mt-14 max-md:mt-10 max-md:max-w-full">
                <div class="flex gap-5 flex-wrap">
                    <!-- Render ProductCard components for each product -->
                    <ProductCard
                        v-for="(product, index) in products"
                        :key="index"
                        :name="product.name"
                        :price="product.price"
                        :description="product.description"
                        :image-src="product.image_url"
                        :alt="product.name || 'Product image'"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
