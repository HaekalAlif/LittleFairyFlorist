<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref, onMounted } from "vue";

const products = ref([]);
const errorMessage = ref(null);
const successMessage = ref(null);
const csrfToken = localStorage.getItem("authToken"); // Ambil CSRF token dari localStorage

async function fetchProducts() {
    try {
        const response = await fetch("http://127.0.0.1:8000/products", {
            headers: {
                Authorization: `Bearer ${csrfToken}`,
                Accept: "application/json",
            },
            credentials: "include",
        });
        const data = await response.json();
        products.value = data;
    } catch (error) {
        console.error("Error fetching products:", error);
        errorMessage.value = "Gagal mengambil data produk. Silakan coba lagi.";
    }
}

function confirmDelete(productId) {
    if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
        deleteProduct(productId);
    }
}

async function deleteProduct(productId) {
    try {
        const response = await fetch(
            `http://127.0.0.1:8000/products/${productId}`,
            {
                method: "DELETE",
                headers: {
                    Authorization: `Bearer ${csrfToken}`,
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                    Accept: "application/json",
                },
                credentials: "include",
            }
        );

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        products.value = products.value.filter(
            (product) => product.id !== productId
        );
        successMessage.value = "Produk berhasil dihapus";
        setTimeout(() => (successMessage.value = null), 3000);
    } catch (error) {
        console.error("Error deleting product:", error);
        errorMessage.value = "Gagal menghapus produk. Silakan coba lagi.";
        setTimeout(() => (errorMessage.value = null), 3000);
    }
}

onMounted(() => {
    fetchProducts();
});
</script>

<template>
    <DashboardLayout>
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Manage Products</h1>

            <!-- Success Message -->
            <div
                v-if="successMessage"
                class="bg-green-100 text-green-800 p-4 rounded mb-4"
            >
                {{ successMessage }}
            </div>

            <!-- Error Message -->
            <div
                v-if="errorMessage"
                class="bg-red-100 text-red-800 p-4 rounded mb-4"
            >
                {{ errorMessage }}
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Harga</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Gambar</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="product in products"
                            :key="product.id"
                            class="border-b"
                        >
                            <td class="px-4 py-2">{{ product.name }}</td>
                            <td class="px-4 py-2">{{ product.price }}</td>
                            <td class="px-4 py-2">{{ product.description }}</td>
                            <td class="px-4 py-2">
                                <img
                                    :src="`/${product.image_url}`"
                                    alt="Product Image"
                                    class="max-w-full h-auto"
                                />
                            </td>
                            <td
                                class="px-4 py-2 flex items-center justify-between"
                            >
                                <button
                                    @click="confirmDelete(product.id)"
                                    class="bg-red-500 hover:bg-red-900 text-white px-3 py-1 rounded transition"
                                >
                                    Delete
                                </button>
                                <router-link
                                    :to="`/edit-product/${product.id}`"
                                    class="bg-blue-500 hover:bg-blue-900 text-white px-3 py-1 rounded transition ml-2"
                                >
                                    Edit
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </DashboardLayout>
</template>
