<script setup>
import MainLayout from "@/layouts/MainLayout.vue";
import { useRouter } from "vue-router";

const router = useRouter();

function goHome() {
    router.push("/");
}
</script>

<template>
    <MainLayout>
        <div
            class="flex flex-col items-center justify-center h-screen bg-red-200 p-4"
        >
            <h1 class="text-9xl font-bold text-red-400 animate-bounce">404</h1>
            <p class="text-2xl text-gray-600 mt-4 text-center">
                Halaman yang Anda cari tidak ditemukan
            </p>
            <button
                @click="goHome"
                class="mt-8 px-6 py-3 bg-red-400 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-red-500 transition duration-300"
            >
                Kembali ke Beranda
            </button>
        </div>
    </MainLayout>
</template>

<style scoped>
.animate-bounce {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@media (max-width: 768px) {
    h1 {
        font-size: 6rem;
    }

    p {
        font-size: 1.5rem;
    }

    button {
        font-size: 1rem;
        padding: 0.5rem 1.5rem;
    }
}
</style>
