<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import Swal from "sweetalert2"; // Import SweetAlert2

const testimonials = ref([]);
const errorMessage = ref(null);
const successMessage = ref(null);
const router = useRouter();
const csrfToken = localStorage.getItem("authToken");

async function fetchTestimonials() {
    try {
        const response = await fetch("http://127.0.0.1:8000/testimonials", {
            headers: {
                Authorization: `Bearer ${csrfToken}`,
                Accept: "application/json",
            },
            credentials: "include",
        });
        testimonials.value = await response.json();
    } catch (error) {
        console.error("Error fetching testimonials:", error);
        errorMessage.value =
            "Gagal mengambil data testimonial. Silakan coba lagi.";
    }
}

function confirmDelete(testimonialId) {
    // Ganti confirm dengan SweetAlert2
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda tidak bisa mengembalikan testimonial ini setelah dihapus.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteTestimonial(testimonialId);
        }
    });
}

async function deleteTestimonial(testimonialId) {
    try {
        const response = await fetch(
            `http://127.0.0.1:8000/testimonials/${testimonialId}`,
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

        testimonials.value = testimonials.value.filter(
            (testimonial) => testimonial.id !== testimonialId
        );

        // SweetAlert sukses setelah berhasil menghapus testimonial
        Swal.fire({
            title: "Berhasil!",
            text: "Testimonial telah dihapus.",
            icon: "success",
            confirmButtonColor: "#3085d6",
        });
    } catch (error) {
        console.error("Error deleting testimonial:", error);
        errorMessage.value = "Gagal menghapus testimonial. Silakan coba lagi.";
        setTimeout(() => (errorMessage.value = null), 3000);
    }
}

onMounted(() => {
    fetchTestimonials();
});
</script>

<template>
    <DashboardLayout>
        <div class="container mx-auto p-6 bg-red-200">
            <h1 class="text-3xl font-bold text-red-500 mb-6">
                Manage Testimonials
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

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Nama Pelanggan</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Gambar</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="testimonial in testimonials"
                            :key="testimonial.id"
                            class="border-b"
                        >
                            <td class="px-4 py-2">
                                {{ testimonial.customer_name }}
                            </td>

                            <td class="px-4 py-2">
                                {{ testimonial.description }}
                            </td>
                            <td class="px-4 py-2">
                                <img
                                    :src="`/storage/${testimonial.image_url}`"
                                    alt="Testimonial Image"
                                    class="max-w-[200px]"
                                />
                            </td>
                            <td
                                class="px-4 py-20 flex items-center justify-between"
                            >
                                <button
                                    @click="confirmDelete(testimonial.id)"
                                    class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded transition"
                                >
                                    Delete
                                </button>
                                <router-link
                                    :to="`/edit-testimonial/${testimonial.id}`"
                                    class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded transition ml-2"
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
