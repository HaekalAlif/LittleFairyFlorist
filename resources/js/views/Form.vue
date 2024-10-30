<script setup lang>
import MainLayout from '@/layouts/MainLayout.vue'
</script>


<template>
    <MainLayout>
        <div class="bg-pink-200 flex justify-center items-center min-h-screen py-8">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h1 class="text-2xl font-bold mb-6 text-center">Form Pemesanan</h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Pembeli</label>
                        <input
                            type="text"
                            v-model="namaPembeli"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nomor Whatsapp</label>
                        <input
                            type="text"
                            v-model="nomorWhatsapp"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <input
                            type="text"
                            v-model="alamat"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Gambar Referensi</label>
                        <input
                            type="file"
                            @change="handleFileUpload"
                            class="w-full px-3 py-2 border rounded-lg"
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Jumlah Buket</label>
                        <input
                            type="number"
                            v-model="jumlahBuket"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Catatan Tambahan</label>
                        <textarea
                            v-model="catatanTambahan"
                            class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Type here"
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Pengiriman</label>
                        <div class="flex items-center">
                            <input
                                type="radio"
                                v-model="pengiriman"
                                value="Delivery"
                                class="mr-2"
                                required
                            />
                            Delivery
                            <input
                                type="radio"
                                v-model="pengiriman"
                                value="Pickup"
                                class="ml-4 mr-2"
                                required
                            />
                            Pickup
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700"
                            >Tanggal Pickup/Pengiriman</label
                        >
                        <input
                            type="date"
                            v-model="tanggalPengiriman"
                            class="w-full px-3 py-2 border rounded-lg"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-purple-500 text-white py-2 rounded-lg"
                    >
                        Submit
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
                        alert("Pesanan berhasil disimpan!"); // Pop-up sukses
                        window.open(data.whatsapp_url, "_blank"); // Buka WhatsApp dengan URL
                        this.resetForm(); // Reset form setelah sukses
                    } else {
                        alert("Gagal menyimpan pesanan."); // Pop-up gagal
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan."); // Pop-up error
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

<style scoped>
/* Add any custom styles here */
</style>
