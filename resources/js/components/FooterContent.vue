<template>
    <footer
        class="flex overflow-hidden flex-col px-16 py-10 bg-red-200 max-md:px-5"
    >
        <div
            class="flex flex-wrap gap-5 justify-between w-full max-w-[1247px] max-md:max-w-full"
        >
            <div class="flex flex-col items-start my-auto">
                <h2
                    class="text-3xl font-semibold tracking-tighter text-red-400"
                >
                    Little Fairy Florist
                </h2>

                <div class="flex gap-3 mt-10">
                    <a
                        href="https://www.instagram.com/littlefairyflorist_ "
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            loading="lazy"
                            src="/public/assets/icon/Instagram-footer.png"
                            alt="Instagram"
                            class="aspect-square w-[68px]"
                        />
                    </a>
                    <a
                        href="https://www.facebook.com"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            loading="lazy"
                            src="/public/assets/icon/Facebook-footer.png"
                            alt="Facebook"
                            class="aspect-square w-[68px]"
                        />
                    </a>
                    <a
                        href="https://www.twitter.com"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            loading="lazy"
                            src="/public/assets/icon/Twitter-footer.png"
                            alt="Twitter"
                            class="aspect-square w-[68px]"
                        />
                    </a>
                </div>
            </div>
            <nav class="flex flex-col text-red-400">
                <h3
                    class="self-start text-xl font-semibold tracking-tight bg-blend-normal"
                >
                    About
                </h3>
                <ul
                    class="mt-12 text-base font-medium tracking-tight leading-6 bg-blend-normal max-md:mt-10"
                >
                    <li>
                        <a href="#" class="hover:underline">How it works</a>
                    </li>
                    <li><a href="#" class="hover:underline">Featured</a></li>
                    <li><a href="#" class="hover:underline">Partnership</a></li>
                    <li>
                        <a href="#" class="hover:underline"
                            >Business Relation</a
                        >
                    </li>
                </ul>
            </nav>
            <nav class="flex flex-col whitespace-nowrap">
                <h3
                    class="self-start text-xl font-semibold tracking-tight text-red-400"
                >
                    Socials
                </h3>
                <ul
                    class="mt-12 text-base font-medium tracking-tight leading-6 text-red-400 bg-blend-normal max-md:mt-10"
                >
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">Shopee</a></li>
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                </ul>
            </nav>
        </div>
        <hr
            class="shrink-0 mt-14 h-px border border-solid border-slate-600 border-opacity-20 max-md:mt-10 max-md:max-w-full"
        />
        <div
            class="flex flex-wrap gap-10 items-center justify-between mt-6 w-full text-base font-semibold tracking-tight max-md:max-w-full"
        >
            <p class="text-red-400 bg-blend-normal">
                ©2024 Panca Angkasa. All rights reserved
            </p>
            <div class="flex gap-10 text-right text-red-400">
                <a href="#" class="bg-blend-normal basis-auto hover:underline"
                    >Privacy & Policy</a
                >
                <a href="#" class="bg-blend-normal basis-auto hover:underline"
                    >Terms & Condition</a
                >
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>
