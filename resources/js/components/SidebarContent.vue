<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-72 bg-red-300 text-white shadow-lg flex flex-col">
            <div class="p-6">
                <h2 class="text-3xl font-semibold mb-10 text-center tracking-wide">
                    Little Fairy Florist
                </h2>
                <nav>
                    <ul class="space-y-4">
                        <li>
                            <router-link
                                to="/dashboard"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Dashboard
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/orders"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Orders
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/manage-product"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Products
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/add-product"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Add Product
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/manage-testimonial"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Testimonial
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/add-testimonial"
                                class="block py-3 px-4 rounded-md hover:bg-red-500 hover:text-gray-100 transition duration-300 ease-in-out"
                            >
                                Add Testimonial
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="mt-auto p-6">
                <button
                    @click="logout"
                    class="block w-full py-3 px-4 text-left bg-red-500 rounded-md hover:bg-red-600 hover:text-gray-100 transition duration-300 ease-in-out"
                >
                    Logout
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
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

                localStorage.removeItem("authToken");
                this.$router.push("/login");
            } catch (error) {
                console.error("Logout error:", error);
            }
        },
    },
};
</script>

<style scoped>
/* General */
a,
button {
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Sidebar */
aside {
    height: 100vh; 
    overflow: hidden; 
    display: flex;
    flex-direction: column; 
}
</style>
