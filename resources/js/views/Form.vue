<script setup>
import MainLayout from "@/layouts/MainLayout.vue";
import Swal from "sweetalert2"; // Import SweetAlert2
</script>

<template>
    <MainLayout>
        <div
            class="bg-red-200 flex justify-center items-center min-h-screen py-8 px-4"
        >
            <div
                class="bg-white p-10 mt-20 rounded-lg shadow-lg w-full max-w-4xl"
            >
                <h1 class="text-3xl font-bold mb-8 text-center text-red-500">
                    Form Pemesanan Bunga
                </h1>
                <form @submit.prevent="submitForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Nama Pembeli</label
                            >
                            <input
                                type="text"
                                v-model="namaPembeli"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                placeholder="Masukkan Nama Anda"
                                required
                            />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Nomor WhatsApp</label
                            >
                            <input
                                type="text"
                                v-model="nomorWhatsapp"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                placeholder="Masukkan Nomor WhatsApp"
                                required
                            />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Alamat</label
                            >
                            <input
                                type="text"
                                v-model="alamat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                placeholder="Masukkan Alamat Pengiriman"
                                required
                            />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Gambar Referensi</label
                            >
                            <input
                                type="file"
                                @change="handleFileUpload"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                            />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Jumlah Buket</label
                            >
                            <input
                                type="number"
                                v-model="jumlahBuket"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                placeholder="Masukkan Jumlah Buket"
                                required
                            />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2"
                                >Catatan Tambahan</label
                            >
                            <textarea
                                v-model="catatanTambahan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                placeholder="Tambahkan Catatan jika ada"
                            ></textarea>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2"
                                >Pengiriman</label
                            >
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input
                                        type="radio"
                                        v-model="pengiriman"
                                        value="Delivery"
                                        class="focus:ring-red-400"
                                        required
                                    />
                                    <span>Delivery</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input
                                        type="radio"
                                        v-model="pengiriman"
                                        value="Pickup"
                                        class="focus:ring-red-400"
                                        required
                                    />
                                    <span>Pickup</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2"
                                >Tanggal Pickup/Pengiriman</label
                            >
                            <input
                                type="date"
                                v-model="tanggalPengiriman"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-400 transition"
                                required
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="w-full mt-8 bg-red-400 text-white py-3 rounded-md font-semibold shadow-lg hover:bg-red-500 transition duration-300"
                    >
                        Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </MainLayout>
</template>

<script>
export default {
    data() {
        return {
            namaPembeli: "",
            nomorWhatsapp: "",
            alamat: "",
            gambarReferensi: null,
            jumlahBuket: "",
            catatanTambahan: "",
            pengiriman: "",
            tanggalPengiriman: "",
        };
    },
    methods: {
        handleFileUpload(event) {
            this.gambarReferensi = event.target.files[0];
        },
        submitForm() {
            const formData = new FormData();
            formData.append("customer_name", this.namaPembeli);
            formData.append("customer_phone", this.nomorWhatsapp);
            formData.append("address", this.alamat);
            formData.append("image_reference", this.gambarReferensi);
            formData.append("quantity", this.jumlahBuket);
            formData.append("additional_notes", this.catatanTambahan);
            formData.append("pickup_option", this.pengiriman);
            formData.append("delivery_date", this.tanggalPengiriman);

            fetch("/orders", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire({
                            title: "Pesanan Berhasil!",
                            text: "Pesanan Anda berhasil disimpan, anda akan diarahkan ke kontak WhatsApp admin.",
                            icon: "success",
                            confirmButtonText: "Tutup",
                        });
                        setTimeout(() => {
                            window.location.href = data.whatsapp_url;
                        }, 2000);
                        this.resetForm();
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Gagal menyimpan pesanan, coba lagi nanti.",
                            icon: "error",
                            confirmButtonText: "Tutup",
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: "Terjadi Kesalahan!",
                        text: "Terjadi kesalahan saat mengirim pesanan.",
                        icon: "error",
                        confirmButtonText: "Tutup",
                    });
                });
        },
        resetForm() {
            this.namaPembeli = "";
            this.nomorWhatsapp = "";
            this.alamat = "";
            this.gambarReferensi = null;
            this.jumlahBuket = "";
            this.catatanTambahan = "";
            this.pengiriman = "";
            this.tanggalPengiriman = "";
        },
    },
};
</script>
