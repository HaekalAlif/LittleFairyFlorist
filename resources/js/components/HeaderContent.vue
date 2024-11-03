<template>
    <header
        class="flex absolute top-2 left-0 right-0 z-10 overflow-hidden flex-wrap gap-10 px-16 py-6 font-semibold bg-transparent max-md:px-5"
    >
        <h1 class="text-2xl tracking-tighter text-red-400">
            Little Fairy Florist
        </h1>
        <div class="flex flex-1"></div>
        <nav
            class="flex gap-10 self-start text-base tracking-tight text-stone-600 justify-end"
        >
            <ul class="md:flex md-items-center">
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
    </header>
</template>

<style scoped>
.text-red-400 {
    color: #f87171;
}

.font-bold {
    font-weight: bold;
}
</style>
