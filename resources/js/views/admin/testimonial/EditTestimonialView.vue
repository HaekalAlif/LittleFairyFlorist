<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";

const testimonial = ref({
    customer_name: "",
    image: null,
    description: "",
});
const route = useRoute();
const router = useRouter();
const errorMessage = ref(null);
const successMessage = ref(null);
const authToken = localStorage.getItem("authToken"); // Ambil auth token dari localStorage

async function fetchTestimonial() {
    const id = route.params.id;
    try {
        const response = await fetch(
            `http://127.0.0.1:8000/testimonials/${id}`,
            {
                headers: {
                    Authorization: `Bearer ${authToken}`,
                    Accept: "application/json",
                },
                credentials: "include",
            }
        );

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        testimonial.value = data; // Mengisi data testimonial yang diambil
    } catch (error) {
        console.error("Error fetching testimonial:", error);
        errorMessage.value =
            "Gagal mengambil data testimonial. Silakan coba lagi.";
    }
}

function handleFileUpload(event) {
    testimonial.value.image = event.target.files[0];
}

async function submitForm() {
    const id = route.params.id;

    const formData = new FormData();
    formData.append("customer_name", testimonial.value.customer_name);
    formData.append("description", testimonial.value.description || "");
    if (testimonial.value.image) {
        formData.append("image", testimonial.value.image);
    }
    formData.append("_method", "PUT"); // Menambahkan metode PUT ke FormData

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    try {
        const response = await fetch(
            `http://127.0.0.1:8000/testimonials/${id}`,
            {
                method: "POST", // Menggunakan POST tetapi diperlakukan sebagai PUT oleh Laravel
                body: formData,
                headers: {
                    Authorization: `Bearer ${authToken}`,
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
            }
        );

        if (!response.ok) {
            const errorData = await response.json();
            console.error("Validation errors:", errorData.errors);
            errorMessage.value = errorData.errors
                ? errorData.errors.customer_name || "Validasi gagal."
                : "Terjadi kesalahan.";
            return;
        }

        successMessage.value = "Testimonial berhasil diperbarui!";
        setTimeout(() => router.push("/manage-testimonial"), 2000);
    } catch (error) {
        console.error("Error:", error);
        errorMessage.value = "Terjadi kesalahan saat memperbarui testimonial.";
    }
}

// Fetch testimonial data saat komponen di-mount
onMounted(() => {
    fetchTestimonial();
});
</script>

<template>
    <DashboardLayout>
        <div
            class="bg-red-200 flex justify-center items-center min-h-screen py-8"
        >
            <div
                class="bg-white p-8 mt-20 rounded-lg shadow-lg w-full max-w-md"
            >
                <h1 class="text-2xl font-bold mb-6 text-center">
                    Edit Testimonial
                </h1>

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
                        <label class="block text-gray-700"
                            >Nama Pelanggan</label
                        >
                        <input
                            type="text"
                            v-model="testimonial.customer_name"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea
                            v-model="testimonial.description"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700"
                            >Gambar Testimonial</label
                        >
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
                        Perbarui Testimonial
                    </button>
                </form>
            </div>
        </div>
    </DashboardLayout>
</template>

<style scoped>
/* Tambahkan gaya khusus jika diperlukan */
</style>
