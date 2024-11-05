<script>
export default {
    name: "ProductCard",
    props: {
        name: {
            type: String,
            required: true,
        },
        price: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: true,
        },
        imageSrc: {
            type: String,
            required: true,
        },
        alt: {
            type: String,
            required: true,
        },
    },
};
</script>

<template>
    <article
        class="product-card relative w-[calc(25%-15px)] max-md:w-full bg-red-400 rounded-xl p-6 text-orange-100 mb-12"
    >
        <header class="flex justify-between items-center mb-8">
            <h3 class="text-xl tracking-tight text-white">{{ name }}</h3>
            <img
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/bdeb4b1f4935d71f9f46690a83cffbf6d67d7090e9b51c64c62c844c7821d052?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb"
                alt=""
                class="w-6 h-6"
                aria-hidden="true"
            />
        </header>
        <img
            :src="`/${imageSrc}`"
            :alt="alt"
            class="w-full object-contain aspect-[1.13] rounded-none mb-2.5"
            loading="lazy"
        />

        <h4 class="text-16 font-medium leading-none mb-1.5 mt-4">{{ name }}</h4>
        <p class="text-16 font-bold leading-none mb-5 mt-3">{{ price }}</p>
        <hr
            class="border-t border-orange-100 opacity-50 mb-1"
            aria-hidden="true"
        />
        <p class="text-12px font-medium leading-5 mt-3 mb-12">
            {{ description }}
        </p>
        <a href="/order">
            <button
                class="absolute bottom-6 right-6 px-5 font-semibold tracking-tight text-center text-red-400 bg-orange-100 rounded h-11 w-[150px]"
            >
                Pesan Sekarang
            </button>
        </a>
    </article>
</template>
