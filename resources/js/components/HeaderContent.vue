<template>
    <header
        :class="[
            'flex fixed top-0 left-0 right-0 z-50 overflow-hidden flex-wrap gap-10 px-16 py-5 font-semibold max-md:px-5 shadow-md transition-colors duration-300',
            isScrolled ? 'bg-pink-500' : 'bg-transparent',
        ]"
    >
        <h1 class="text-2xl tracking-tighter text-red-400">
            Little Fairy Florist
        </h1>
        <div class="flex flex-1"></div>
        <!-- Hamburger Menu Button -->
        <button
            @click="toggleSidebar"
            class="block md:hidden text-red-400"
            aria-label="Toggle navigation"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </button>
        <!-- Navbar -->
        <nav
            class="hidden md:flex gap-10 self-start text-base tracking-tight text-stone-600 justify-end"
        >
            <ul class="flex items-center">
                <li class="mx-4 duration-500">
                    <router-link
                        to="/"
                        active-class="text-red-400 font-bold"
                        class="hover:text-red-400"
                    >
                        Home
                    </router-link>
                </li>
                <li class="mx-4 duration-500">
                    <router-link
                        to="/product"
                        active-class="text-red-400 font-bold"
                        class="hover:text-red-400"
                    >
                        Product
                    </router-link>
                </li>
                <li class="mx-4 duration-500">
                    <router-link
                        to="/order"
                        active-class="text-red-400 font-bold"
                        class="hover:text-red-400"
                    >
                        Order
                    </router-link>
                </li>
                <li class="mx-4 duration-500">
                    <router-link
                        to="/contact"
                        active-class="text-red-400 font-bold"
                        class="hover:text-red-400"
                    >
                        Contact
                    </router-link>
                </li>
                <li class="mx-4 duration-500">
                    <router-link
                        to="/login"
                        active-class="text-red-400 font-bold"
                        class="hover:text-red-400"
                    >
                        Login
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Overlay -->
        <div
            v-if="isSidebarOpen"
            class="fixed top-0 left-0 w-full h-full bg-black/50 z-20"
            @click="toggleSidebar"
        ></div>
        <!-- Sidebar -->
        <aside
            :class="[
                'fixed top-0 right-0 w-64 h-full bg-pink-500 shadow-lg z-30 transition-transform transform max-md:bg-FFC6C6',
                isSidebarOpen ? 'translate-x-0' : 'translate-x-full',
            ]"
        >
            <div class="p-6 flex flex-col gap-4">
                <h2 class="text-xl font-bold text-red-400">Menu</h2>
                <ul>
                    <li class="my-4 duration-500">
                        <router-link
                            to="/"
                            active-class="text-red-400 font-bold"
                            class="hover:text-red-400"
                        >
                            Home
                        </router-link>
                    </li>
                    <li class="my-4 duration-500">
                        <router-link
                            to="/product"
                            active-class="text-red-400 font-bold"
                            class="hover:text-red-400"
                        >
                            Product
                        </router-link>
                    </li>
                    <li class="my-4 duration-500">
                        <router-link
                            to="/order"
                            active-class="text-red-400 font-bold"
                            class="hover:text-red-400"
                        >
                            Order
                        </router-link>
                    </li>
                    <li class="my-4 duration-500">
                        <router-link
                            to="/contact"
                            active-class="text-red-400 font-bold"
                            class="hover:text-red-400"
                        >
                            Contact
                        </router-link>
                    </li>
                    <li class="my-4 duration-500">
                        <router-link
                            to="/login"
                            active-class="text-red-400 font-bold"
                            class="hover:text-red-400"
                        >
                            Login
                        </router-link>
                    </li>
                </ul>
            </div>
        </aside>
    </header>
</template>

<script>
export default {
    data() {
        return {
            isSidebarOpen: false,
            isScrolled: false,
        };
    },
    methods: {
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
        handleScroll() {
            this.isScrolled = window.scrollY > 0;
        },
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
};
</script>

<style scoped>
.text-red-400 {
    color: #f87171;
}

.font-bold {
    font-weight: bold;
}

.fixed {
    position: fixed;
}

.bg-black\/50 {
    background-color: rgba(0, 0, 0, 0.5);
}

.shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.bg-pink-500 {
    background-color: #ffc6c6;
}

.bg-transparent {
    background-color: transparent;
}

@media (max-width: 768px) {
    .bg-pink-500 {
        background-color: #ffc6c6;
    }
}
</style>
