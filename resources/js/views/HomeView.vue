<script setup lang>
import MainLayout from "@/layouts/MainLayout.vue";
</script>

<template>
    <MainLayout>
        <div class="flex flex-col">
            <header class="flex flex-col w-full max-md:max-w-full">
                <div
                    class="flex flex-col w-full rounded-none max-md:max-w-full"
                >
                    <div class="flex flex-col bg-red-200 max-md:max-w-full">
                        <main
                            class="flex flex-col text-base text-red-400 rounded-none"
                        >
                            <section
                                class="flex relative flex-col items-start px-14 pt-60 w-full min-h-[816px] max-md:px-5 max-md:py-24 max-md:max-w-full"
                            >
                                <img
                                    src="/public/assets/images/bg-landing.png"
                                    alt=""
                                    class="object-cover absolute inset-0 w-full h-[960px] -mt-36"
                                />
                                <h1
                                    class="relative gap-2.5 self-stretch p-2.5 text-5xl font-bold leading-none uppercase w-[575px] max-md:max-w-full max-md:text-4xl"
                                >
                                    little fairy florist
                                </h1>
                                <p
                                    class="relative mt-4 ml-3 font-medium tracking-tight leading-7 w-[548px] max-md:max-w-full"
                                >
                                    Bawa keindahan yang bermakna dalam hidup
                                    Anda dengan rangkaian bunga dari Little
                                    Fairy Florist. Setiap buket kami susun
                                    dengan penuh cinta dan perhatian,
                                    menghadirkan kesempurnaan yang menyentuh
                                    hati. Dari bunga segar yang indah hingga
                                    rangkaian elegan yang unik, kami menciptakan
                                    momen tak terlupakan untuk setiap kesempatan
                                    spesial Anda.
                                </p>
                                <a href="/order">
                                    <button
                                        class="relative gap-2 self-stretch px-5 mt-9 mb-0 ml-3 font-semibold tracking-tight text-center text-orange-100 bg-red-400 rounded min-h-[44px] w-[150px] max-md:mb-2.5 max-md:ml-2.5 outline-none"
                                    >
                                        Pesan Sekarang
                                    </button>
                                </a>
                            </section>
                        </main>

                        <nav
                            class="flex gap-6 px-px py-3 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10 items-center justify-center"
                        >
                            <div class="grow shrink w-56 text-rose-100">
                                little fairy florist
                            </div>
                            <div
                                class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                            ></div>
                            <div class="grow shrink w-56">
                                little fairy florist
                            </div>
                            <div
                                class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                            ></div>
                            <div class="grow shrink w-56">
                                little fairy florist
                            </div>
                            <div
                                class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                            ></div>
                            <div class="grow shrink w-56">
                                little fairy florist
                            </div>
                            <div
                                class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                            ></div>
                            <div class="grow shrink w-[228px]">
                                little fairy florist
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
        </div>

        <section class="flex flex-col rounded-none">
            <div
                class="flex flex-col px-16 pt-16 pb-16 w-full bg-orange-100 max-md:px-5 max-md:pb-24 max-md:max-w-full"
            >
                <h1
                    class="self-center text-5xl font-bold tracking-tighter text-red-400 max-md:max-w-full max-md:text-4xl"
                >
                    Langkah-Langkah Pemesanan
                </h1>
                <div
                    class="mt-20 mb-0 max-md:mt-10 max-md:mb-2.5 max-md:max-w-full"
                >
                    <div class="flex gap-5 max-md:flex-col">
                        <article
                            class="flex flex-col w-3/12 max-md:ml-0 max-md:w-full"
                        >
                            <div
                                class="flex overflow-hidden flex-col grow items-center px-8 pt-16 pb-11 w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-8"
                            >
                                <div
                                    class="flex items-center justify-center bg-red-300 h-[106px] w-[106px] rounded-[30px]"
                                >
                                    <img
                                        src="/public/assets/icon/step-order-1.png"
                                        alt=""
                                        class="h-[80px] w-[80px] object-contain"
                                    />
                                </div>

                                <h2
                                    class="mt-12 text-2xl font-semibold tracking-tight max-md:mt-10"
                                >
                                    Memilih Bunga
                                </h2>
                                <p
                                    class="self-stretch mt-6 text-sm tracking-tight leading-6"
                                >
                                    Memilih memilih berbagai jenis Bucket yang
                                    tersedia, sesuai kebutuhan atau preferensi
                                </p>
                            </div>
                        </article>
                        <article
                            class="flex flex-col ml-5 w-3/12 max-md:ml-0 max-md:w-full"
                        >
                            <div
                                class="flex overflow-hidden flex-col grow items-center px-8 pt-16 pb-11 w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-8"
                            >
                                <div
                                    class="flex items-center justify-center bg-red-300 h-[106px] w-[106px] rounded-[30px]"
                                >
                                    <img
                                        src="/public/assets/icon/step-order-2.png"
                                        alt=""
                                        class="h-[80px] w-[80px] object-contain"
                                    />
                                </div>
                                <h2
                                    class="mt-12 text-xl font-semibold tracking-tight max-md:mt-10"
                                >
                                    Reservasi Pemesanan
                                </h2>
                                <p
                                    class="self-stretch mt-7 text-sm tracking-tight leading-6"
                                >
                                    Lakukan reservasi dengan mengisi Form
                                    Pemesanan di website atau melalui chat
                                    WhatsApp (WA).
                                </p>
                            </div>
                        </article>
                        <article
                            class="flex flex-col ml-5 w-3/12 max-md:ml-0 max-md:w-full"
                        >
                            <div
                                class="flex overflow-hidden flex-col grow items-center px-8 pt-16 pb-11 w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-8"
                            >
                                <div
                                    class="flex items-center justify-center bg-red-300 h-[106px] w-[106px] rounded-[30px]"
                                >
                                    <img
                                        src="/public/assets/icon/step-order-3.png"
                                        alt=""
                                        class="h-[80px] w-[80px] object-contain"
                                    />
                                </div>
                                <h2
                                    class="mt-12 text-xl font-semibold tracking-tight max-md:mt-10"
                                >
                                    Konfirmasi Pemesanan
                                </h2>
                                <p
                                    class="self-stretch mt-7 text-sm tracking-tight leading-6"
                                >
                                    konfirmasi melalui WhatsApp untuk memastikan
                                    pesanan akan disiapkan.
                                </p>
                            </div>
                        </article>
                        <article
                            class="flex flex-col ml-5 w-3/12 max-md:ml-0 max-md:w-full"
                        >
                            <div
                                class="flex overflow-hidden flex-col grow items-center px-8 pt-16 pb-11 w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-8"
                            >
                                <div
                                    class="flex items-center justify-center bg-red-300 h-[106px] w-[106px] rounded-[30px]"
                                >
                                    <img
                                        src="/public/assets/icon/step-order-4.png"
                                        alt=""
                                        class="h-[80px] w-[80px] object-contain"
                                    />
                                </div>
                                <h2
                                    class="mt-12 text-xl font-semibold tracking-tight max-md:mt-10"
                                >
                                    Melakukan Pembayaran
                                </h2>
                                <p
                                    class="self-stretch mt-7 text-sm tracking-tight leading-6"
                                >
                                    Melakukan pembayaran sesuai dengan harga
                                    Bucket agar pesanan dapat segera diproses.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div
                class="flex flex-col items-center px-1 w-full bg-orange-100 max-md:max-w-full"
            >
                <div class="w-full">
                    <nav
                        class="flex gap-6 px-px py-3 mt-20 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10"
                    >
                        <div class="grow shrink w-56 text-rose-100">
                            little fairy florist
                        </div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-[228px]">
                            little fairy florist
                        </div>
                    </nav>
                </div>

                <section
                    class="flex flex-col w-full px-20 pt-16 pb-20 bg-red-200 max-md:px-5 max-md:pt-24"
                >
                    <h1
                        class="text-5xl font-bold tracking-tighter text-center text-red-400 max-md:text-4xl"
                    >
                        Etalase Produk
                    </h1>

                    <p
                        class="mt-4 text-lg font-semibold leading-7 text-center text-red-400 max-md:max-w-full"
                    >
                        Temukan rangkaian bunga istimewa kami yang dirancang
                        dengan penuh cinta dan perhatian. Setiap buket
                        menghadirkan sentuhan keindahan yang akan membuat momen
                        Anda semakin berkesan. Pilih dari berbagai koleksi bunga
                        terbaik kami untuk setiap kesempatan spesial.
                    </p>
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/b805a2be92d4461a6793e250daae87708e8f4adf40520c298d8b20accf12184d?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                        alt="Showcase of flower arrangements"
                        class="object-contain mt-16 w-full max-md:mt-10 max-md:max-w-full"
                    />
                    <div class="mt-12 max-md:mt-10 max-md:max-w-full">
                        <div class="flex gap-5 max-md:flex-col">
                            <div
                                class="flex flex-col w-3/12 max-md:ml-0 max-md:w-full"
                            >
                                <div class="flex flex-col grow max-md:mt-8">
                                    <div
                                        class="flex overflow-hidden flex-col p-6 w-full bg-red-400 rounded-xl max-w-[304px] max-md:px-5"
                                    >
                                        <div
                                            class="flex gap-5 justify-between text-xl font-bold tracking-tight text-white"
                                        >
                                            <h2>Blooming Romance</h2>
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/ff41e72210f4fee020eabee8d60f4c1acca44a5e07b16077f21b615026060bbe?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt=""
                                                class="object-contain shrink-0 w-6 aspect-square"
                                            />
                                        </div>
                                        <img
                                            loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b55edb1144b24eb2c96d760adbe35c8fa0d5fe1296086e7f9843a98ed4c25c17?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                            alt="Blooming Romance flower arrangement"
                                            class="object-contain mt-8 w-full rounded-none aspect-[1.13] max-md:mx-1"
                                        />
                                        <button
                                            class="gap-2 self-end px-5 mt-5 text-base font-semibold tracking-tight text-center text-red-400 bg-orange-100 rounded min-h-[44px] w-[150px]"
                                        >
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-3/12 max-md:ml-0 max-md:w-full"
                            >
                                <div class="flex flex-col grow max-md:mt-8">
                                    <div
                                        class="flex overflow-hidden flex-col p-6 w-full bg-red-400 rounded-xl max-w-[304px] max-md:px-5"
                                    >
                                        <div
                                            class="flex gap-5 justify-between text-xl font-bold tracking-tight text-white"
                                        >
                                            <h2>Sweet Serenity</h2>
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e009c636bb57756a74f9cc18027711796e4e6a2fd0f6b03b40f6adcd5c8abe7?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt=""
                                                class="object-contain shrink-0 w-6 aspect-square"
                                            />
                                        </div>
                                        <div
                                            class="flex flex-col pb-2.5 mt-9 rounded-3xl max-md:mx-1"
                                        >
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/67c6aa64364cab1d05576ad1c99d4a689b103c2a2ffa6bad50ffb634b250b06b?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt="Sweet Serenity flower arrangement"
                                                class="object-contain z-10 -mt-2.5 w-full rounded-none aspect-[1.13]"
                                            />
                                        </div>
                                        <button
                                            class="gap-2 self-end px-5 mt-4 text-base font-semibold tracking-tight text-center text-red-400 bg-orange-100 rounded min-h-[44px] w-[150px]"
                                        >
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-3/12 max-md:ml-0 max-md:w-full"
                            >
                                <div class="flex flex-col grow max-md:mt-8">
                                    <div
                                        class="flex overflow-hidden flex-col p-6 w-full bg-red-400 rounded-xl max-w-[304px] max-md:pl-5"
                                    >
                                        <div
                                            class="flex gap-5 justify-between text-xl font-bold tracking-tight text-white max-md:mr-1"
                                        >
                                            <h2>Joyful Blossoms</h2>
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e009c636bb57756a74f9cc18027711796e4e6a2fd0f6b03b40f6adcd5c8abe7?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt=""
                                                class="object-contain shrink-0 w-6 aspect-square"
                                            />
                                        </div>
                                        <img
                                            loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba32df55465d7709e0be7ccfa59f3afcf18a07b0d34bacf69e1e91283121da63?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                            alt="Joyful Blossoms flower arrangement"
                                            class="object-contain self-start mt-6 w-full rounded-none aspect-[1.13]"
                                        />
                                        <button
                                            class="gap-2 self-end px-5 mt-7 text-base font-semibold tracking-tight text-center text-red-400 bg-orange-100 rounded min-h-[44px] w-[150px]"
                                        >
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-3/12 max-md:ml-0 max-md:`w-full`"
                            >
                                <div class="flex flex-col grow max-md:mt-8">
                                    <div
                                        class="flex overflow-hidden flex-col p-6 w-full bg-red-400 rounded-xl max-w-[304px] max-md:pl-5"
                                    >
                                        <div
                                            class="flex gap-5 justify-between text-xl font-bold tracking-tight text-white max-md:mr-1.5"
                                        >
                                            <h2>Classic Elegance</h2>
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/a1127e7f5c75ae6442bbe0ffc6e07811b3afca3ff5db08e12337f83860d90984?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt=""
                                                class="object-contain shrink-0 w-6 aspect-square"
                                            />
                                        </div>
                                        <img
                                            loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a6f0fc46d0c93fcd54b10a2cf60ead1484a21c8d8b37b06273fb453a0f6536f8?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                            alt="Classic Elegance flower arrangement"
                                            class="object-contain mt-5 w-full rounded-none aspect-[1.13] max-md:mr-2 max-md:ml-1"
                                        />
                                        <button
                                            class="gap-2 self-end px-5 mt-8 text-base font-semibold tracking-tight text-center text-red-400 bg-orange-100 rounded min-h-[44px] w-[150px]"
                                        >
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="w-full">
                    <nav
                        class="flex gap-6 px-px py-3 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10 items-center justify-center"
                    >
                        <div class="grow shrink w-56 text-rose-100">
                            little fairy florist
                        </div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-[228px]">
                            little fairy florist
                        </div>
                    </nav>
                </div>

                <section class="flex flex-col rounded-none">
                    <div
                        class="flex flex-col justify-center items-center px-20 py-24 w-full bg-orange-100 max-md:px-5 max-md:max-w-full"
                    >
                        <div
                            class="flex flex-col items-center w-full max-w-[1167px] max-md:max-w-full"
                        >
                            <h2
                                class="ml-5 text-5xl font-bold tracking-tighter text-center text-red-400 max-md:max-w-full max-md:text-4xl"
                            >
                                Mengapa Memilih Little Fairy Florist?
                            </h2>
                            <p
                                class="mt-4 ml-3 text-lg leading-7 text-center text-red-400 max-md:max-w-full"
                            >
                                Kami hadir bukan hanya untuk merangkai bunga,
                                tetapi untuk menciptakan momen yang penuh makna
                                dan kenangan. Setiap buket dirancang dengan
                                cinta dan perhatian, menjadikan hari spesial
                                Anda semakin berkesan. Little Fairy Florist
                                bangga menjadi bagian dari kebahagiaan Anda.
                            </p>
                            <div
                                class="self-stretch mt-14 max-md:mt-10 max-md:max-w-full"
                            >
                                <div class="flex gap-5 max-md:flex-col">
                                    <div
                                        class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full"
                                    >
                                        <div
                                            class="flex flex-col grow justify-center px-6 py-7 w-full bg-red-200 rounded-3xl max-md:px-5 max-md:mt-10 max-md:max-w-full"
                                        >
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/80b685a5eb64935662398061fba2a297faeae3eb4b1462f5bbfb5a2c9e147bb5?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                                alt="Little Fairy Florist showcase"
                                                class="object-contain w-full rounded-3xl aspect-[0.95] max-md:max-w-full"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full"
                                    >
                                        <div
                                            class="flex flex-col self-stretch my-auto w-full text-red-400 max-md:mt-10 max-md:max-w-full"
                                        >
                                            <div class="flex gap-6 self-start">
                                                <div
                                                    class="flex items-center justify-center bg-pink-100 h-[70px] w-[70px] rounded-[30px]"
                                                >
                                                    <img
                                                        src="/public/assets/icon/reason-1.png"
                                                        alt=""
                                                        class="h-[30px] w-[30px] object-contain"
                                                    />
                                                </div>
                                                <div
                                                    class="flex flex-col grow shrink-0 basis-0 w-fit"
                                                >
                                                    <h3
                                                        class="self-start text-2xl font-bold tracking-tight"
                                                    >
                                                        Layanan Personal dari
                                                        Pemilik
                                                    </h3>
                                                    <p
                                                        class="text-base font-medium tracking-tight leading-7"
                                                    >
                                                        Sebagai pemilik, saya
                                                        pribadi terlibat dalam
                                                        setiap proses untuk
                                                        memastikan kualitas dan
                                                        kepuasan Anda.
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="flex flex-wrap gap-6 mt-9 max-md:mr-1"
                                            >
                                                <div
                                                    class="flex items-center justify-center bg-pink-100 h-[70px] w-[70px] rounded-[30px]"
                                                >
                                                    <img
                                                        src="/public/assets/icon/reason-2.png"
                                                        alt=""
                                                        class="h-[30px] w-[30px] object-contain"
                                                    />
                                                </div>
                                                <div
                                                    class="flex flex-col grow shrink-0 basis-0 w-fit"
                                                >
                                                    <h3
                                                        class="self-start text-2xl font-bold tracking-tight"
                                                    >
                                                        Kualitas dan Harga
                                                        Terbaik
                                                    </h3>
                                                    <p
                                                        class="text-base font-medium tracking-tight leading-7"
                                                    >
                                                        Kami berkomitmen untuk
                                                        menghadirkan rangkaian
                                                        bunga terbaik dengan
                                                        harga yang sesuai, tanpa
                                                        mengorbankan keindahan
                                                        dan ketulusan dalam
                                                        setiap rangkaian.
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="flex flex-wrap gap-6 mt-8"
                                            >
                                                <div
                                                    class="flex items-center justify-center bg-pink-100 h-[70px] w-[70px] rounded-[30px]"
                                                >
                                                    <img
                                                        src="/public/assets/icon/reason-3.png"
                                                        alt=""
                                                        class="h-[30px] w-[30px] object-contain"
                                                    />
                                                </div>
                                                <div
                                                    class="flex flex-col grow shrink-0 basis-0 w-fit"
                                                >
                                                    <h3
                                                        class="self-start text-2xl font-bold tracking-tight"
                                                    >
                                                        Selalu Ada untuk Anda
                                                    </h3>
                                                    <p
                                                        class="mt-4 text-base font-medium tracking-tight leading-7"
                                                    >
                                                        Dengan layanan yang
                                                        mudah diakses dan
                                                        jangkauan luas, kami
                                                        siap membantu kebutuhan
                                                        bunga Anda kapan saja.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="w-full">
                    <nav
                        class="flex gap-6 px-px py-3 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10 items-center justify-center"
                    >
                        <div class="grow shrink w-56 text-rose-100">
                            little fairy florist
                        </div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-[228px]">
                            little fairy florist
                        </div>
                    </nav>
                </div>

                <section class="flex flex-col rounded-none">
                    <div
                        class="flex flex-col justify-center px-14 py-16 w-full bg-red-200 max-md:px-5 max-md:max-w-full"
                    >
                        <img
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/55429668fa6eb625ca067f1edc1464582740a7e4ab6eec4b7d6fde9f0cc5977a?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                            alt="Decorative image"
                            class="object-contain w-full rounded-xl aspect-[3.69] max-md:max-w-full"
                        />
                    </div>
                </section>

                <div class="w-full">
                    <nav
                        class="flex gap-6 px-px py-3 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10 items-center justify-center"
                    >
                        <div class="grow shrink w-56 text-rose-100">
                            little fairy florist
                        </div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-56">little fairy florist</div>
                        <div
                            class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"
                        ></div>
                        <div class="grow shrink w-[228px]">
                            little fairy florist
                        </div>
                    </nav>
                </div>

                <section class="flex flex-col rounded-none">
                    <div
                        class="flex flex-col items-center pt-16 pb-14 w-full bg-orange-100 max-md:pt-24 max-md:max-w-full"
                    >
                        <h2
                            class="text-4xl font-medium leading-none text-center text-red-400 max-md:max-w-full"
                        >
                            Dipercaya oleh Ratusan Pelanggan yang Bahagia
                        </h2>

                        <p
                            class="mt-8 text-lg leading-7 text-center text-red-400 max-md:max-w-full"
                        >
                            Kami bangga menjadi bagian dari momen spesial
                            Anda.<br />
                            Berikut adalah pengalaman pelanggan kami yang telah
                            merasakan keindahan dan makna dalam setiap rangkaian
                            bunga dari Little Fairy Florist.
                        </p>
                        <div
                            class="flex flex-col self-stretch px-14 mt-14 w-full max-md:px-5 max-md:mt-10 max-md:max-w-full"
                        >
                            <div
                                class="grid grid-cols-3 gap-5 max-md:grid-cols-1 max-md:ml-0 max-md:w-full"
                            >
                                <article>
                                    <div
                                        class="flex flex-col px-11 py-7 mx-auto w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-10"
                                    >
                                        <div
                                            class="flex gap-5 items-start self-start ml-3 text-center max-md:ml-2.5"
                                        >
                                            <img
                                                class="flex shrink-0 w-10 h-10 bg-white rounded-full"
                                                src="/public/assets/images/profile/profil-1.png"
                                                alt=""
                                            />
                                            <div class="flex flex-col mt-2.5">
                                                <h3
                                                    class="self-start text-lg font-medium leading-loose"
                                                >
                                                    FufuFafa
                                                </h3>
                                                <p
                                                    class="mt-2.5 text-sm leading-loose"
                                                >
                                                    Surakarta, Jawa Tengah
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mt-5 text-base leading-6">
                                            "Pesanannya sangat cantik dan
                                            elegan! Little Fairy Florist
                                            benar-benar membuat momen ulang
                                            tahun saya semakin spesial. Bunga
                                            segar dan rangkaiannya unik. Pasti
                                            akan pesan lagi!"
                                        </p>
                                    </div>
                                </article>
                                <article>
                                    <div
                                        class="flex flex-col px-8 py-7 mx-auto w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-10"
                                    >
                                        <div
                                            class="flex gap-5 items-start self-start ml-3 text-center max-md:ml-2.5"
                                        >
                                            <img
                                                class="flex shrink-0 w-10 h-10 bg-white rounded-full"
                                                src="/public/assets/images/profile/profil-2.png"
                                                alt=""
                                            />
                                            <div class="flex flex-col mt-2">
                                                <h3
                                                    class="self-start text-lg font-medium leading-loose"
                                                >
                                                    Faiz Ahnaf
                                                </h3>
                                                <p
                                                    class="mt-2 text-sm leading-loose"
                                                >
                                                    Sragen, Jawa Tengah
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mt-7 text-base leading-8">
                                            "Dari awal pemesanan hingga
                                            pengiriman, pelayanannya sangat
                                            memuaskan. Buket bunga untuk
                                            perayaan anniversary kami luar
                                            biasa. Terima kasih Little Fairy
                                            Florist!"
                                        </p>
                                    </div>
                                </article>
                                <article>
                                    <div
                                        class="flex flex-col px-8 py-7 mx-auto w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-10"
                                    >
                                        <div
                                            class="flex gap-5 items-start self-start ml-3 text-center max-md:ml-2.5"
                                        >
                                            <img
                                                class="flex shrink-0 w-10 h-10 bg-white rounded-full"
                                                src="/public/assets/images/profile/profil-3.png"
                                                alt=""
                                            />
                                            <div class="flex flex-col mt-2">
                                                <h3
                                                    class="self-start text-lg font-medium leading-loose"
                                                >
                                                    Izzati Putri
                                                </h3>
                                                <p
                                                    class="mt-2 text-sm leading-loose"
                                                >
                                                    Magelang, Jawa tengah
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mt-7 text-base leading-8">
                                            "Saya sangat terkesan dengan
                                            kualitas bunga dan rangkaiannya.
                                            Setiap detail terasa diperhatikan
                                            dengan baik. Little Fairy Florist
                                            selalu menjadi pilihan utama saya!"
                                        </p>
                                    </div>
                                </article>
                            </div>

                            <div
                                class="flex flex-wrap gap-5 justify-between mt-20 ml-3 w-full max-w-[1192px] max-md:mt-10 max-md:max-w-full"
                            >
                                <div class="flex gap-4 my-auto">
                                    <img
                                        loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/50193aaa2dffb3ca3e1551b0693f90390abf7b1388e6a0badba82315767cc1f2?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7"
                                        class="object-contain shrink-0 aspect-[3] w-[45px]"
                                        alt="Decorative element"
                                    />
                                    <span
                                        class="flex shrink-0 rounded-full bg-stone-400 bg-opacity-50 h-[15px] w-[15px]"
                                    ></span>
                                    <span
                                        class="flex shrink-0 rounded-full bg-stone-400 bg-opacity-50 h-[15px] w-[15px]"
                                    ></span>
                                    <span
                                        class="flex shrink-0 rounded-full bg-stone-400 bg-opacity-50 h-[15px] w-[15px]"
                                    ></span>
                                </div>

                                <div class="flex gap-2 my-auto">
                                    <button
                                        class="flex items-center justify-center shrink-0 w-8 h-8 bg-rose-50 rounded-full"
                                        aria-label="Previous testimonial"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                    <button
                                        class="flex items-center justify-center shrink-0 w-8 h-8 bg-rose-50 rounded-full"
                                        aria-label="Next testimonial"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </MainLayout>
</template>