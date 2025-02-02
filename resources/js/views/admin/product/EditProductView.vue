<template>
    <DashboardLayout>
        <div
            class="bg-red-200 flex justify-center items-center min-h-screen py-8"
        >
            <div
                class="bg-white p-8 mt-20 rounded-lg shadow-lg w-full max-w-md"
            >
                
      <h1 class="text-3xl font-bold text-red-500 mb-6">Edit Product</h1>

                <div
                    v-if="successMessage"
                    class="bg-green-100 text-green-800 p-4 rounded mb-4"
                >
                    {{ successMessage }}
                </div>

                <div
                    v-if="errorMessage"
                    class="bg-red-100 text-red-800 p-4 rounded mb-4"
                >
                    {{ errorMessage }}
                </div>

                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Produk</label>
                        <input
                            type="text"
                            v-model="product.name"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan nama produk"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea
                            v-model="product.description"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan deskripsi"
                            required
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Harga</label>
                        <input
                            type="number"
                            v-model="product.price"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan harga"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Gambar Produk</label>
                        <input
                            type="file"
                            @change="handleFileUpload"
                            class="w-full px-3 py-2 border rounded-lg"
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-red-300 text-white py-2 rounded-lg"
                    >
                        Perbarui Produk
                    </button>
                </form>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import Swal from "sweetalert2";
const product = ref({
    name: "",
    description: "",
    price: 0,
    image: null,
});
const route = useRoute();
const router = useRouter();
const errorMessage = ref(null);
const successMessage = ref(null);
const authToken = localStorage.getItem("authToken"); // Ambil auth token dari localStorage

// Fetch product data when the component is mounted
async function fetchProduct() {
    const id = route.params.id; // Get the product ID from the route parameters
    try {
        const response = await fetch(`http://127.0.0.1:8000/products/${id}`, {
            headers: {
                Authorization: `Bearer ${authToken}`,
                Accept: "application/json",
            },
            credentials: "include",
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        product.value = data; // Mengisi data produk yang diambil
    } catch (error) {
        console.error("Error fetching product:", error);
        errorMessage.value = "Gagal mengambil data produk. Silakan coba lagi.";
    }
}

function handleFileUpload(event) {
    product.value.image = event.target.files[0]; // Menangani file upload
}

async function submitForm() {
    const id = route.params.id;

    const formData = new FormData();
    formData.append("name", product.value.name);
    formData.append("description", product.value.description || "");
    formData.append("price", product.value.price || 0);
    if (product.value.image) {
        formData.append("image", product.value.image);
    }
    formData.append("_method", "PUT"); // Menambahkan metode PUT ke FormData

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    try {
        const response = await fetch(`http://127.0.0.1:8000/products/${id}`, {
            method: "POST", // Menggunakan POST tetapi diperlakukan sebagai PUT oleh Laravel
            body: formData,
            headers: {
                Authorization: `Bearer ${authToken}`,
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
        });

        if (!response.ok) {
            const errorData = await response.json();
            console.error("Validation errors:", errorData.errors);
            errorMessage.value = errorData.errors
                ? errorData.errors.name || "Validasi gagal."
                : "Terjadi kesalahan.";
            return;
        }

        // SweetAlert untuk notifikasi sukses
        await Swal.fire({
            title: "Berhasil!",
            text: "Produk berhasil diperbarui!",
            icon: "success",
            confirmButtonText: "OK",
            timer: 2000, // SweetAlert akan otomatis ditutup setelah 2 detik
            timerProgressBar: true,
        });

        // Redirect ke halaman manage-product setelah SweetAlert
        router.push("/manage-product");
    } catch (error) {
        console.error("Error updating product:", error);
        errorMessage.value = "Terjadi kesalahan saat memperbarui produk.";
    }
}


// Fetch product data saat komponen di-mount
onMounted(() => {
    fetchProduct();
});
</script>

<style scoped>
/* Tambahkan gaya khusus jika diperlukan */
</style>
