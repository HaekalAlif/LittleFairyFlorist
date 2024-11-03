<script setup lang>
import MainLayout from "@/layouts/MainLayout.vue";
</script>

<template>
    <MainLayout
        ><div class="flex justify-center items-center h-screen bg-red-200">
            <div class="w-full max-w-md bg-white p-8 rounded shadow">
                <h2 class="text-2xl font-semibold text-center mb-6">
                    Admin Login
                </h2>
                <form @submit.prevent="login">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700"
                            >Email</label
                        >
                        <input
                            type="email"
                            v-model="email"
                            class="w-full p-2 border border-gray-300 rounded mt-1"
                            required
                        />
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700"
                            >Password</label
                        >
                        <input
                            type="password"
                            v-model="password"
                            class="w-full p-2 border border-gray-300 rounded mt-1"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-red-300 text-white p-2 rounded"
                    >
                        Login
                    </button>
                    <p v-if="errorMessage" class="text-red-500 text-sm mt-2">
                        {{ errorMessage }}
                    </p>
                </form>
            </div>
        </div>
    </MainLayout>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            errorMessage: null,
        };
    },
    methods: {
        login() {
            const formData = new FormData();
            formData.append("email", this.email);
            formData.append("password", this.password);

            fetch("http://127.0.0.1:8000/login", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                credentials: "include",
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Login berhasil");
                        localStorage.setItem("authToken", data.token); // Adjust as per your backend response
                        window.location.href = "/dashboard";
                    } else {
                        console.error("Gagal login:", data.message);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },
    },
};
</script>
