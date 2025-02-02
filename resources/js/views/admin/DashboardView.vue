<script setup>
import { ref, onMounted } from "vue";
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { Chart, registerables } from "chart.js";

Chart.register(...registerables);

// State untuk jumlah data dan pesanan terbaru
const totalProducts = ref(0);
const totalTestimonials = ref(0);
const totalOrders = ref(0);
const recentOrders = ref([]); // Menyimpan data pesanan terbaru

let chartInstance = null;

// Fungsi untuk membuat grafik
const createChart = (data) => {
    const ctx = document.getElementById("dashboardChart").getContext("2d");
    if (chartInstance) {
        chartInstance.destroy();
    }
    chartInstance = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Produk", "Testimoni", "Pesanan"],
            datasets: [
                {
                    label: "Jumlah Data",
                    data: data,
                    backgroundColor: "rgba(255, 182, 193, 0.7)",
                    borderColor: "rgba(255, 105, 180, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
            },
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5,
                    },
                },
            },
        },
    });
};

// Fungsi untuk mengambil data dari API
const fetchData = async () => {
    try {
        const productsResponse = await fetch("http://127.0.0.1:8000/products");
        const productsData = await productsResponse.json();
        totalProducts.value = productsData.length;

        const testimonialsResponse = await fetch(
            "http://127.0.0.1:8000/testimonials"
        );
        const testimonialsData = await testimonialsResponse.json();
        totalTestimonials.value = testimonialsData.length;

        const ordersResponse = await fetch("http://127.0.0.1:8000/orders");
        const ordersData = await ordersResponse.json();
        totalOrders.value = ordersData.length;

        recentOrders.value = ordersData.sort((a, b) => b.id - a.id);

        createChart([
            totalProducts.value,
            totalTestimonials.value,
            totalOrders.value,
        ]);
    } catch (error) {
        console.error("Gagal mengambil data:", error);
    }
};

onMounted(() => {
    fetchData();
});
</script>

<template>
    <DashboardLayout>
        <div class="p-6 h-screen flex flex-col bg-red-100">
            <h1 class="text-3xl font-bold text-red-500 mb-6">Dashboard</h1>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="stat-card hover:scale-105 transition-transform duration-300"
                >
                    <h3 class="text-lg font-medium text-gray-800">
                        Jumlah Produk
                    </h3>
                    <p class="text-2xl font-bold text-red-500">
                        {{ totalProducts }}
                    </p>
                </div>
                <div
                    class="stat-card hover:scale-105 transition-transform duration-300"
                >
                    <h3 class="text-lg font-medium text-gray-800">
                        Jumlah Testimoni
                    </h3>
                    <p class="text-2xl font-bold text-red-500">
                        {{ totalTestimonials }}
                    </p>
                </div>
                <div
                    class="stat-card hover:scale-105 transition-transform duration-300"
                >
                    <h3 class="text-lg font-medium text-gray-800">
                        Jumlah Pesanan
                    </h3>
                    <p class="text-2xl font-bold text-red-500">
                        {{ totalOrders }}
                    </p>
                </div>
            </div>

            <!-- Ringkasan -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 flex-grow">
                <div
                    class="bg-white p-6 rounded-lg shadow-md flex flex-col h-full"
                >
                    <h2 class="text-lg font-medium text-gray-800 mb-4">
                        Grafik Produk
                    </h2>
                    <div class="flex-grow">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-lg shadow-md flex flex-col h-full"
                >
                    <h2 class="text-lg font-medium text-gray-800 mb-4">
                        Pesanan Terbaru
                    </h2>
                    <div class="overflow-y-auto" style="max-height: 300px">
                        <!-- Membatasi tinggi dan menambahkan scroll -->
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left">
                                        Order ID
                                    </th>
                                    <th class="px-4 py-2 text-left">Status</th>
                                    <th class="px-4 py-2 text-left">
                                        Customer
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="order in recentOrders"
                                    :key="order.orderId"
                                >
                                    <td class="border px-4 py-2">
                                        {{ order.id }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ order.status }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ order.customer_name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Link Sosial Media -->
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8"
            >
                <a
                    href="https://shopee.co.id"
                    target="_blank"
                    class="bg-white p-4 rounded-lg shadow-md flex items-center gap-4 hover:bg-red-100 w-full"
                >
                    <img
                        src="/public/assets/icon/shopee.png"
                        alt="Shopee"
                        class="w-8 h-8"
                    />
                    <span class="text-lg font-medium text-red-500">Shopee</span>
                </a>
                <a
                    href="https://wa.me/6283159961555"
                    target="_blank"
                    class="bg-white p-4 rounded-lg shadow-md flex items-center gap-4 hover:bg-green-100 w-full"
                >
                    <img
                        src="/public/assets/icon/whatsapp.png"
                        alt="WhatsApp"
                        class="w-8 h-8"
                    />
                    <span class="text-lg font-medium text-green-500"
                        >WhatsApp</span
                    >
                </a>
                <a
                    href="https://instagram.com"
                    target="_blank"
                    class="bg-white p-4 rounded-lg shadow-md flex items-center gap-4 hover:bg-pink-100 w-full"
                >
                    <img
                        src="/public/assets/icon/instagram.png"
                        alt="Instagram"
                        class="w-8 h-8"
                    />
                    <span class="text-lg font-medium text-pink-500"
                        >Instagram</span
                    >
                </a>
            </div>
        </div>
    </DashboardLayout>
</template>

<style scoped>
/* Custom Card Style */
.stat-card {
    @apply bg-red-200 p-4 rounded-lg shadow-md flex flex-col items-center justify-center text-center;
}

.stat-card:hover {
    @apply bg-red-300;
}

h-screen {
    height: 100vh;
}
</style>
