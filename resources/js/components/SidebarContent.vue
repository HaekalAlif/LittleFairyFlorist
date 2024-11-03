<template>
    <div class="flex min-h-screen">
        <aside class="w-64 bg-red-300 p-6">
            <h2 class="text-2xl font-bold mb-4">Little Fairy Florist</h2>
            <nav>
                <ul>
                    <li class="mb-2">
                        <router-link
                            to="/dashboard"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Dashboard
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/orders"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Orders
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/manage-product"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Products
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/add-product"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Add Product
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/manage-testimonial"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Testimonial
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/add-testimonial"
                            class="block p-2 rounded hover:bg-red-400"
                        >
                            Add Testimonial
                        </router-link>
                    </li>
                    <li>
                        <button
                            @click="logout"
                            class="block w-full text-left p-2 rounded hover:bg-red-400"
                        >
                            Logout
                        </button>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 bg-gray-100">
            <slot></slot>
        </main>
    </div>
</template>

<script>
export default {
    methods: {
        async logout() {
            try {
                const token = localStorage.getItem("authToken");
                const response = await fetch("http://127.0.0.1:8000/logout", {
                    method: "POST",
                    headers: {
                        Authorization: `Bearer ${token}`,
                        Accept: "application/json",
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    credentials: "include",
                });

                if (!response.ok) {
                    throw new Error("Logout failed");
                }

                // Hapus token dari localStorage
                localStorage.removeItem("authToken");

                // Redirect ke halaman login
                this.$router.push("/login");
            } catch (error) {
                console.error("Logout error:", error);
                // Handle error sesuai kebutuhan
            }
        },
    },
};
</script>
