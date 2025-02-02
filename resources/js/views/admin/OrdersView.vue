<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref } from "vue";
import Swal from "sweetalert2";
</script>

<template>
    <DashboardLayout>
        <div class="container mx-auto p-6 bg-red-200">
            <h1 class="text-3xl font-bold text-red-500 mb-6">Orders</h1>

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
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Alamat</th>
                            <th class="px-4 py-2 border">
                                Tanggal Kirim/Ambil
                            </th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Catatan</th>
                            <th class="px-4 py-2 border">Referensi Gambar</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="order in orders"
                            :key="order.id"
                            class="border-b"
                        >
                            <td class="px-4 py-2">{{ order.customer_name }}</td>
                            <td class="px-4 py-2">
                                {{ order.customer_phone }}
                            </td>
                            <td class="px-4 py-2">{{ order.address }}</td>
                            <td class="px-4 py-2">{{ order.delivery_date }}</td>
                            <td class="px-4 py-2">
                                <select
                                    v-model="order.status"
                                    @change="updateOrderStatus(order)"
                                    class="border rounded px-2 py-1 w-[120px]"
                                >
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td class="px-4 py-2">
                                {{ order.additional_notes }}
                            </td>
                            <td class="px-4 py-2">
                                <img
                                    :src="`/storage/${order.image_reference}`"
                                    alt="Order Image"
                                    class="max-w-[200px] h-auto"
                                />
                            </td>
                            <td
                                class="px-4 py-20 flex items-center justify-center"
                            >
                                <button
                                    @click="confirmDelete(order.id)"
                                    class="bg-red-500 hover:bg-red-900 text-white px-3 py-1 rounded transition"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
export default {
    data() {
        return {
            orders: [],
            errorMessage: null,
            successMessage: null,
        };
    },
    methods: {
        async fetchOrders() {
            try {
                const token = localStorage.getItem("authToken");
                const response = await fetch("http://127.0.0.1:8000/orders", {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${token}`,
                        Accept: "application/json",
                    },
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                this.orders = data;
                this.errorMessage = null;
            } catch (error) {
                console.error("Error fetching orders:", error);
                this.errorMessage =
                    "Gagal mengambil data orders. Silakan coba lagi.";
            }
        },

        confirmDelete(orderId) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Pesanan ini akan dihapus secara permanen.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteOrder(orderId);
                }
            });
        },

        async deleteOrder(orderId) {
            try {
                // Ambil token otentikasi dari localStorage
                const token = localStorage.getItem("authToken");
                if (!token) {
                    throw new Error("Token otentikasi tidak ditemukan");
                }

                // Ambil CSRF token dari meta tag
                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                if (!csrfToken) {
                    throw new Error("CSRF token tidak ditemukan");
                }

                // Kirim permintaan DELETE ke backend
                const response = await fetch(
                    `http://127.0.0.1:8000/orders/${orderId}`,
                    {
                        method: "DELETE",
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "X-CSRF-TOKEN": csrfToken, // Tambahkan CSRF token
                            Accept: "application/json",
                        },
                    }
                );

                // Periksa apakah respons berhasil
                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(
                        errorData.message ||
                            `HTTP error! status: ${response.status}`
                    );
                }

                // Hapus pesanan dari array lokal
                this.orders = this.orders.filter(
                    (order) => order.id !== orderId
                );

                // Tampilkan pesan sukses
                Swal.fire("Dihapus!", "Pesanan berhasil dihapus.", "success");
            } catch (error) {
                console.error("Error deleting order:", error);
                Swal.fire(
                    "Error!",
                    error.message ||
                        "Gagal menghapus pesanan. Silakan coba lagi.",
                    "error"
                );
            }
        },

        async updateOrderStatus(order) {
            try {
                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                const response = await fetch(
                    `http://127.0.0.1:8000/orders/${order.id}`,
                    {
                        method: "PUT",
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem(
                                "authToken"
                            )}`,
                            "Content-Type": "application/json",
                            Accept: "application/json",
                            "X-CSRF-TOKEN": token, // Tambahkan header CSRF
                        },
                        body: JSON.stringify({ status: order.status }),
                    }
                );

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                this.successMessage = "Status pesanan berhasil diperbarui";
                Swal.fire({
                    title: "Berhasil!",
                    text: "Status pesanan telah berhasil diperbarui.",
                    icon: "success",
                    confirmButtonText: "OK",
                });

                setTimeout(() => (this.successMessage = null), 3000);
            } catch (error) {
                console.error("Error updating order status:", error);
                this.errorMessage =
                    "Gagal memperbarui status pesanan. Silakan coba lagi.";
                setTimeout(() => (this.errorMessage = null), 3000);
            }
        },
    },
    mounted() {
        this.fetchOrders();
    },
};
</script>
