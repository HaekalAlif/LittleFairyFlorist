<script setup>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import { ref } from "vue";
</script>

<template>
    <DashboardLayout>
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Orders</h1>

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
                                    class="max-w-full h-auto"
                                />
                            </td>
                            <td
                                class="px-4 py-20 flex items-center justify-between"
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
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                        Accept: "application/json",
                    },
                    credentials: "include",
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

        // Confirm delete order
        confirmDelete(orderId) {
            if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
                this.deleteOrder(orderId);
            }
        },

        // Delete order
        async deleteOrder(orderId) {
            try {
                const token = localStorage.getItem("authToken");
                const response = await fetch(
                    `http://127.0.0.1:8000/orders/${orderId}`,
                    {
                        method: "DELETE",
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                            Accept: "application/json",
                            "Content-Type": "application/json",
                        },
                        credentials: "include",
                    }
                );

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                this.orders = this.orders.filter(
                    (order) => order.id !== orderId
                );
                this.successMessage = "Pesanan berhasil dihapus";
                setTimeout(() => (this.successMessage = null), 3000);
            } catch (error) {
                console.error("Error deleting order:", error);
                this.errorMessage =
                    "Gagal menghapus pesanan. Silakan coba lagi.";
                setTimeout(() => (this.errorMessage = null), 3000);
            }
        },

        // Update order status
        async updateOrderStatus(order) {
            try {
                const token = localStorage.getItem("authToken");
                const response = await fetch(
                    `http://127.0.0.1:8000/orders/${order.id}`,
                    {
                        method: "PUT",
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        credentials: "include",
                        body: JSON.stringify({ status: order.status }),
                    }
                );

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                this.successMessage = "Status pesanan berhasil diperbarui";
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
