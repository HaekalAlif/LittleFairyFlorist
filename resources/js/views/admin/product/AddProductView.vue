<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import Swal from "sweetalert2";
</script>

<template>
    <DashboardLayout>
        <div
            class="bg-red-200 flex justify-center items-center min-h-screen py-6"
        >
            <div
                class="bg-white p-8 mt-15 rounded-lg shadow-lg w-full max-w-md"
            >
                <h1 class="text-3xl font-bold text-red-500 mb-6 text-center">
                    Add Product
                </h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Produk</label>
                        <input
                            type="text"
                            v-model="product.name"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea
                            v-model="product.description"
                            class="w-full px-3 py-2kamka border rounded-lg"
                            placeholder="Type here"
                            required
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Harga</label>
                        <input
                            type="number"
                            v-model="product.price"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Gambar Produk</label>
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
                        Tambah Produk
                    </button>
                </form>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
export default {
    data() {
        return {
            product: {
                name: "",
                description: "",
                price: 0,
                image: null,
            },
        };
    },
    methods: {
        handleFileUpload(event) {
            this.product.image = event.target.files[0];
        },
        submitForm() {
            const formData = new FormData();
            formData.append("name", this.product.name);
            formData.append("description", this.product.description);
            formData.append("price", this.product.price);
            formData.append("image", this.product.image);

            const authToken = localStorage.getItem("authToken");

            fetch("/products", {
                method: "POST",
                body: formData,
                headers: {
                    Authorization: `Bearer ${authToken}`,
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.message) {
                        // SweetAlert untuk notifikasi sukses
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Produk berhasil ditambahkan!",
                            icon: "success",
                            confirmButtonText: "OK",
                            timer: 2000, // SweetAlert akan otomatis ditutup setelah 2 detik
                            timerProgressBar: true,
                        }).then(() => {
                            this.resetForm();
                            this.$router.push("/manage-product");
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text:
                                "Gagal menambahkan produk: " +
                                JSON.stringify(data.errors),
                            icon: "error",
                            confirmButtonText: "OK",
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Terjadi kesalahan saat menambahkan produk.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                });
        },
        resetForm() {
            this.product.name = "";
            this.product.description = "";
            this.product.price = 0;
            this.product.image = null;
        },
    },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
