<script>
import ProductCard from "./ProductCard.vue";

export default {
    name: "ProductSection",
    components: {
        ProductCard,
    },
    data() {
        return {
            products: [
                {
                    name: "Simple Lily Bouquet",
                    price: "Rp 89.999",
                    description:
                        "Rangkaian bunga lily sederhana yang penuh kesan anggun dan segar.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/7aabf55b519224717e5bf2a1bb94a68e680f5f1b17e2a6a9f757040347c01b6b?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Simple Lily Bouquet arrangement",
                },
                {
                    name: "White Rose Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Mawar putih yang minimalis untuk keindahan yang sederhana namun elegan.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/3102c27e5e8c4acc5905e9e185386592315272bb87b997dee45d1d433f36d763?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "White Rose Bouquet arrangement",
                },
                {
                    name: "Special Snack Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Buket unik berisi camilan favorit untuk hadiah yang tak terlupakan.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/fffd28ac2544a3783e61f6a641618db2b214bd4ce779590247f615034f8ba83d?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Special Snack Bouquet arrangement",
                },
                {
                    name: "Red Rose Mini Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Buket mawar merah mungil yang elegan untuk momen spesial.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/8d490edcc957d4aaa731e90d18bcf5ba485559d8a7036d8c6b12b34a2dc5cb72?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Red Rose Mini Bouquet arrangement",
                },
                {
                    name: "Simple Lily Bouquet",
                    price: "Rp 89.999",
                    description:
                        "Rangkaian bunga lily sederhana yang penuh kesan anggun dan segar.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/7aabf55b519224717e5bf2a1bb94a68e680f5f1b17e2a6a9f757040347c01b6b?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Simple Lily Bouquet arrangement",
                },
                {
                    name: "White Rose Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Mawar putih yang minimalis untuk keindahan yang sederhana namun elegan.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/3102c27e5e8c4acc5905e9e185386592315272bb87b997dee45d1d433f36d763?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "White Rose Bouquet arrangement",
                },
                {
                    name: "Special Snack Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Buket unik berisi camilan favorit untuk hadiah yang tak terlupakan.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/fffd28ac2544a3783e61f6a641618db2b214bd4ce779590247f615034f8ba83d?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Special Snack Bouquet arrangement",
                },
                {
                    name: "Red Rose Mini Bouquet",
                    price: "Rp 99.999",
                    description:
                        "Buket mawar merah mungil yang elegan untuk momen spesial.",
                    imageSrc:
                        "https://cdn.builder.io/api/v1/image/assets/TEMP/8d490edcc957d4aaa731e90d18bcf5ba485559d8a7036d8c6b12b34a2dc5cb72?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb",
                    alt: "Red Rose Mini Bouquet arrangement",
                },
            ],
        };
    },
};
</script>

<template>
    <section class="product-section bg-orange-100 py-14 pt-24">
        <header class="text-center">
            <h2
                class="text-base font-bold leading-none text-red-400 uppercase tracking-[3px] mb-6"
            >
                PRODUK kAMI
            </h2>
            <h1
                class="text-5xl font-bold tracking-tighter leading-none text-red-400 max-md:text-4xl"
            >
                Little Fairy Florist
            </h1>
        </header>

        <div class="container mx-auto px-16 mt-10 max-md:px-5 max-md:mt-10">
            <div class="bg-red-400 rounded-2xl px-16 max-md:px-5">
                <div class="flex gap-5 max-md:flex-col">
                    <div class="w-[57%] max-md:w-full">
                        <div class="text-white my-auto mt-16">
                            <p class="text-2xl leading-tight max-md:max-w-full">
                                Pilihan Terbaik Online untuk Bucket Bunga
                            </p>
                            <h2
                                class="mt-5 mr-6 text-6xl font-bold max-md:mr-2.5 max-md:max-w-full max-md:text-4xl"
                            >
                                LITTLE FAIRY FLORIST
                            </h2>
                            <p
                                class="mt-11 text-3xl font-medium max-md:mt-10 max-md:max-w-full"
                            >
                                Untuk Momen dan Orang Spesial di Hidup Anda
                            </p>
                        </div>
                    </div>
                    <div class="w-[43%] max-md:w-full">
                        <img
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/41df0c3a3eec6d1048f9ab1832df97cfc4f282d36912e6b8f836e6f547380181?placeholderIfAbsent=true&apiKey=43173da6028646f7a188adcc787551eb"
                            alt="Decorative floral arrangement"
                            class="w-full object-contain aspect-[1.61] rounded-none"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>

            <h3
                class="mt-14 text-2xl font-bold leading-none text-red-400 max-md:mt-10 max-md:max-w-full"
            >
                <span class="font-medium"
                    >Dapatkan penawaran terbaik untuk</span
                >
                Bucket bunga
            </h3>

            <div class="mt-14 max-md:mt-10 max-md:max-w-full">
                <div class="flex gap-5 flex-wrap">
                    <ProductCard
                        v-for="(product, index) in products"
                        :key="index"
                        :name="product.name"
                        :price="product.price"
                        :description="product.description"
                        :image-src="product.imageSrc"
                        :alt="product.alt"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
