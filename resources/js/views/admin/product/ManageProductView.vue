<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref, onMounted } from "vue";
import Swal from "sweetalert2"; // Pastikan Anda telah menginstal SweetAlert2

const products = ref([]);
const errorMessage = ref(null);
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

async function fetchProducts() {
    try {
        const response = await fetch("http://127.0.0.1:8000/products", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("authToken")}`,
                Accept: "application/json",
            },
            credentials: "include",
        });
        const data = await response.json();
        products.value = data;
    } catch (error) {
        console.error("Error fetching products:", error);
        errorMessage.value = "Gagal mengambil data produk. Silakan coba lagi.";
        setTimeout(() => (errorMessage.value = null), 3000);
    }
}

function confirmDelete(productId) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Produk ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteProduct(productId);
        }
    });
}

async function deleteProduct(productId) {
    try {
        const response = await fetch(
            `http://127.0.0.1:8000/products/${productId}`,
            {
                method: "DELETE",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("authToken")}`,
                    "X-CSRF-TOKEN": csrfToken,
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

        Swal.fire({
            title: "Berhasil!",
            text: "Produk berhasil dihapus.",
            icon: "success",
            confirmButtonText: "OK",
        });
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
        <div class="container mx-auto p-6 bg-red-200">
            <h1 class="text-3xl font-bold text-red-500 mb-6">Manage Product</h1>

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
                                    class="max-w-[200px]"
                                />
                            </td>
                            <td
                                class="px-4 py-20 flex items-center justify-between"
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
