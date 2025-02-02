<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref } from "vue";
import { useRouter } from "vue-router";
import Swal from "sweetalert2"; // Import SweetAlert2

const testimonial = ref({
    customer_name: "",
    image: null,
    description: "",
});
const router = useRouter();

function handleFileUpload(event) {
    testimonial.value.image = event.target.files[0];
}

async function submitForm() {
    const formData = new FormData();
    formData.append("customer_name", testimonial.value.customer_name);
    formData.append("description", testimonial.value.description);
    if (testimonial.value.image) {
        formData.append("image", testimonial.value.image);
    }

    const authToken = localStorage.getItem("authToken");

    try {
        const response = await fetch("/testimonials", {
            method: "POST",
            body: formData,
            headers: {
                Authorization: `Bearer ${authToken}`,
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        });

        if (!response.ok) {
            throw new Error("Network response was not ok");
        }

        // Show SweetAlert2 when successful
        Swal.fire({
            title: "Berhasil!",
            text: "Testimonial berhasil ditambahkan.",
            icon: "success",
            timer: 2000, // Display for 2 seconds before redirect
            showConfirmButton: false,
        }).then(() => {
            resetForm();
            router.push("/manage-testimonial"); // Redirect after SweetAlert
        });
    } catch (error) {
        console.error("Error:", error);
        Swal.fire({
            title: "Error!",
            text: "Terjadi kesalahan saat menambahkan testimonial.",
            icon: "error",
            confirmButtonText: "OK",
        });
    }
}

function resetForm() {
    testimonial.value.customer_name = "";
    testimonial.value.description = "";
    testimonial.value.image = null;
}
</script>

<template>
    <DashboardLayout>
        <div
            class="bg-red-200 flex justify-center items-center min-h-screen py-6"
        >
            <div
                class="bg-white p-8 mt-12 rounded-lg shadow-lg w-full max-w-md"
            >
                <h1 class="text-3xl font-bold text-red-500 mb-6 text-center">
                    Add Testimonial
                </h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label class="block text-gray-700"
                            >Nama Pelanggan</label
                        >
                        <input
                            type="text"
                            v-model="testimonial.customer_name"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan nama pelanggan"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea
                            v-model="testimonial.description"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan deskripsi"
                            required
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Gambar</label>
                        <input
                            type="file"
                            @change="handleFileUpload"
                            class="w-full px-3 py-2 border rounded-lg"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-red-300 text-white py-2 rounded-lg"
                    >
                        Tambah Testimonial
                    </button>
                </form>
            </div>
        </div>
    </DashboardLayout>
</template>

<style scoped>
/* Add any custom styles here */
</style>
