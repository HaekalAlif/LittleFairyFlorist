<template>
    <footer class="flex overflow-hidden flex-col px-16 py-10 bg-red-200 max-md:px-5">
      <div class="flex flex-wrap gap-5 justify-between w-full max-w-[1247px] max-md:max-w-full">
        <div class="flex flex-col items-start my-auto">
          <h2 class="text-3xl font-semibold tracking-tighter text-red-400">
            Little Fairy Florist
          </h2>
          <p class="self-stretch mt-7 text-base font-medium tracking-tight leading-6 text-red-400">
            Our vision is to provide convenience and help increase your sales business.
          </p>
          <div class="flex gap-3 mt-10">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ec2e2084a956b4777db275f825058585f5fdeba17b4a1f0cb00fda2eababe8c2?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7" alt="" class=" aspect-square w-[68px]" />
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/794a0bb1d6d86b0a4f08acc78c6430d67d51bfb1b540dd4e3cab54be91169d6c?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7" alt="" class=" aspect-[1.15] w-[66px]" />
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/1e2552a2750febb2441dd3d88f0acd96569bc567f715447eeb135147c060419d?placeholderIfAbsent=true&apiKey=e8011a4084744e0fbb615d9ad0bac9f7" alt="" class=" aspect-square w-[68px]" />
          </div>
        </div>
        <nav class="flex flex-col text-red-400">
          <h3 class="self-start text-xl font-semibold tracking-tight bg-blend-normal">
            About
          </h3>
          <ul class="mt-12 text-base font-medium tracking-tight leading-6 bg-blend-normal max-md:mt-10">
            <li><a href="#" class="hover:underline">How it works</a></li>
            <li><a href="#" class="hover:underline">Featured</a></li>
            <li><a href="#" class="hover:underline">Partnership</a></li>
            <li><a href="#" class="hover:underline">Business Relation</a></li>
          </ul>
        </nav>
        <nav class="flex flex-col">
          <h3 class="text-xl font-semibold tracking-tight text-red-400">
            Community
          </h3>
          <ul class="mt-11 text-base font-medium tracking-tight leading-6 text-red-400 bg-blend-normal max-md:mt-10 max-md:mr-1">
            <li><a href="#" class="hover:underline">Events</a></li>
            <li><a href="#" class="hover:underline">Blog</a></li>
            <li><a href="#" class="hover:underline">Podcast</a></li>
            <li><a href="#" class="hover:underline">Invite a friend</a></li>
          </ul>
        </nav>
        <nav class="flex flex-col whitespace-nowrap">
          <h3 class="self-start text-xl font-semibold tracking-tight text-red-400">
            Socials
          </h3>
          <ul class="mt-12 text-base font-medium tracking-tight leading-6 text-red-400 bg-blend-normal max-md:mt-10">
            <li><a href="#" class="hover:underline">Discord</a></li>
            <li><a href="#" class="hover:underline">Instagram</a></li>
            <li><a href="#" class="hover:underline">Twitter</a></li>
            <li><a href="#" class="hover:underline">Facebook</a></li>
          </ul>
        </nav>
      </div>
      <hr class="shrink-0 mt-14 h-px border border-solid border-slate-600 border-opacity-20 max-md:mt-10 max-md:max-w-full" />
      <div class="flex flex-wrap gap-10 items-center justify-between mt-6 w-full text-base font-semibold tracking-tight max-md:max-w-full">
        <p class="text-red-400 bg-blend-normal">
          ©2024 Panca Angkasa. All rights reserved
        </p>
        <div class="flex gap-10 text-right text-red-400">
          <a href="#" class="bg-blend-normal basis-auto hover:underline">Privacy & Policy</a>
          <a href="#" class="bg-blend-normal basis-auto hover:underline">Terms & Condition</a>
        </div>
      </div>
    </footer>
  </template>

  <script>
  export default {
    name: 'Footer'
  }
  </script>
