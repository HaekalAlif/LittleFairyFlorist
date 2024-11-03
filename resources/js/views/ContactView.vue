<template>
    <MainLayout>
        <section class="flex flex-col rounded-none">
            <div
                class="flex flex-col items-center px-20 pt-20 pb-8 w-full bg-orange-100 max-md:px-5 max-md:pb-24 max-md:max-w-full"
            >
                <div
                    class="flex flex-col mb-0 max-w-full w-[768px] max-md:mb-2.5"
                >
                    <h2
                        class="self-center text-base font-bold leading-none text-center text-red-400 uppercase tracking-[3px]"
                    >
                        Hubungi Kami
                    </h2>
                    <h1
                        class="self-center mt-5 ml-4 text-5xl font-bold tracking-tighter leading-none text-center text-red-400 max-md:max-w-full max-md:text-4xl"
                    >
                        Mari Mulai Percakapan
                    </h1>
                    <p
                        class="mx-2.5 mt-8 text-lg leading-7 text-center text-red-400 max-md:max-w-full"
                    >
                        Ingin berdiskusi, memiliki pertanyaan, atau membutuhkan
                        bantuan? Kami siap membantu! Sampaikan kebutuhan Anda,
                        dan tim kami akan segera menghubungi Anda. Jangan ragu,
                        kami ada di sini untuk mendukung Anda setiap saat.
                    </p>
                    <div
                        class="px-16 py-10 mt-8 bg-red-400 max-md:px-5 max-md:mt-10 max-md:max-w-full"
                    >
                        <div class="flex gap-5 max-md:flex-col">
                            <div
                                class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full"
                            >
                                <div
                                    class="flex flex-col grow items-start text-xl leading-relaxed text-orange-100 max-md:mt-10"
                                >
                                    <h3 class="text-sm leading-none">
                                        Jam Kerja
                                    </h3>
                                    <hr
                                        class="shrink-0 self-stretch mt-4 h-px border border-orange-100 border-solid"
                                    />
                                    <p class="mt-4 font-bold">Senin - Jumat</p>
                                    <p class="font-bold">09:00 - 20:00 WIB</p>
                                    <p class="text-base leading-7">
                                        Dukungan Pelanggan 24 Jam
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full"
                            >
                                <div
                                    class="flex flex-col items-start text-orange-100 max-md:mt-10"
                                >
                                    <h3 class="text-sm leading-none">
                                        Kontak Kami
                                    </h3>
                                    <hr
                                        class="shrink-0 self-stretch mt-4 h-px border border-orange-100 border-solid"
                                    />
                                    <p
                                        class="mt-4 text-xl font-bold leading-relaxed"
                                    >
                                        Telepon: 020 7993 2905
                                    </p>
                                    <p class="text-base leading-7">
                                        Email: litleflorrist@finsweet.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Formulir Kontak -->
                    <form @submit.prevent="submitForm" class="w-full">
                        <label for="fullName" class="sr-only">Full Name</label>
                        <input
                            id="fullName"
                            v-model="fullName"
                            type="text"
                            class="gap-2.5 self-stretch p-6 mt-8 text-base leading-7 text-red-400 bg-orange-100 rounded-sm border border-red-400 border-solid max-md:px-5 w-full"
                            placeholder="Full Name"
                            required
                        />

                        <label for="email" class="sr-only">Your Email</label>
                        <input
                            id="email"
                            v-model="email"
                            type="email"
                            class="gap-2.5 self-stretch p-6 mt-4 text-base leading-7 text-red-400 bg-orange-100 rounded-sm border border-red-400 border-solid max-md:px-5 w-full"
                            placeholder="Your Email"
                            required
                        />

                        <label for="message" class="sr-only">Message</label>
                        <textarea
                            id="message"
                            v-model="message"
                            class="gap-2.5 px-6 pt-6 pb-24 mt-5 text-base leading-7 text-red-400 whitespace-nowrap bg-orange-100 rounded-sm border border-red-400 border-solid min-h-[144px] max-md:px-5 w-full"
                            placeholder="Message"
                            required
                        ></textarea>

                        <button
                            type="submit"
                            class="px-16 py-4 mt-4 text-2xl font-bold leading-none text-orange-100 bg-red-400 max-md:px-5 max-md:max-w-full w-full"
                        >
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { ref } from "vue";
import MainLayout from "@/layouts/MainLayout.vue";

// Define reactive properties
const fullName = ref("");
const email = ref("");
const province = ref("");
const city = ref("");
const message = ref("");

// Define methods
function submitForm() {
    // Logika pengiriman formulir
    console.log("Formulir dikirim", {
        fullName: fullName.value,
        email: email.value,
        province: province.value,
        city: city.value,
        message: message.value,
    });
    // Reset field formulir setelah pengiriman
    fullName.value = "";
    email.value = "";
    province.value = "";
    city.value = "";
    message.value = "";
}
</script>
