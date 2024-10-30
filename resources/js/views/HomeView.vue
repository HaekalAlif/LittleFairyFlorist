<script setup lang>
import MainLayout from '@/layouts/MainLayout.vue'
</script>

<template>
  <MainLayout>
        <div class="flex flex-col">
            <header data-layername="section1" class="flex flex-col w-full max-md:max-w-full">
            <div class="flex flex-col w-full rounded-none max-md:max-w-full">
                <div class="flex flex-col px-px pt-44 w-full bg-red-200 max-md:pt-24 max-md:max-w-full">
                <div class="flex flex-col ml-20 max-w-full text-base text-red-400 w-[595px]">
                    <h1 data-layername="littleFairyFlorist" class="gap-2.5 self-stretch p-2.5 text-5xl font-bold leading-none uppercase w-[575px] max-md:max-w-full max-md:text-4xl">
                    little fairy florist
                    </h1>
                    <p data-layername="bawaKeindahanYangBermaknaDalamHidupAndaDenganRangkaianBungaDariLittleFairyFloristSetiapBuketKamiSusunDenganPenuhCintaDanPerhatianMenghadirkanKesempurnaanYangMenyentuhHatiDariBungaSegarYangIndahHinggaRangkaianEleganYangUnikKamiMenciptakanMomenTakTerlupakanUntukSetiapKesempatanSpesialAnda" class="mt-4 mr-9 ml-3 font-medium tracking-tight leading-7 max-md:mr-2.5 max-md:max-w-full">
                    Bawa keindahan yang bermakna dalam hidup Anda dengan rangkaian bunga dari Little Fairy Florist. Setiap buket kami susun dengan penuh cinta dan perhatian, menghadirkan kesempurnaan yang menyentuh hati. Dari bunga segar yang indah hingga rangkaian elegan yang unik, kami menciptakan momen tak terlupakan untuk setiap kesempatan spesial Anda.
                    </p>
                    <button data-layername="buttonRent" class="gap-2 self-start px-5 mt-9 ml-3 font-semibold tracking-tight text-center text-orange-100 bg-red-400 rounded min-h-[44px] w-[130px] max-md:ml-2.5">
                    Pesan Sekarang
                    </button>
                </div>
                <nav class="flex gap-6 px-px py-3 mt-48 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10">
                    <div data-layername="littleFairyFlorist" class="grow shrink w-56 text-rose-100">
                    little fairy florist
                    </div>
                    <div class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"></div>
                    <div data-layername="littleFairyFlorist" class="grow shrink w-56">
                    little fairy florist
                    </div>
                    <div class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"></div>
                    <div data-layername="littleFairyFlorist" class="grow shrink w-56">
                    little fairy florist
                    </div>
                    <div class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"></div>
                    <div data-layername="littleFairyFlorist" class="grow shrink w-56">
                    little fairy florist
                    </div>
                    <div class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"></div>
                    <div data-layername="littleFairyFlorist" class="grow shrink w-[228px]">
                    little fairy florist
                    </div>
                </nav>
                </div>
            </div>
            </header>
        </div>

  <section class="flex flex-col rounded-none">
    <div class="flex flex-col items-center px-1 pt-16 w-full bg-orange-100 max-md:max-w-full">
      <h1 data-layername="langkahLangkahPemesanan" class="text-5xl font-bold tracking-tighter text-red-400 max-md:max-w-full max-md:text-4xl">
        Langkah-Langkah Pemesanan
      </h1>
      <div class="mt-16 w-full max-w-[1309px] max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
          <!-- Looping orderSteps di dalam section ini -->
          <article v-for="(step, index) in orderSteps" :key="index" class="flex flex-col w-3/12 max-md:ml-0 max-md:w-full">
            <div class="flex overflow-hidden flex-col grow items-center px-8 pt-16 pb-11 w-full text-white bg-red-400 rounded-xl max-md:px-5 max-md:mt-8">
              <div class="flex shrink-0 bg-orange-100 h-[106px] rounded-[30px] w-[106px]" :aria-label="step.icon"></div>
              <h2 class="mt-12 text-2xl font-semibold tracking-tight max-md:mt-10">
                {{ step.title }}
              </h2>
              <p class="self-stretch mt-6 text-sm tracking-tight leading-6">
                {{ step.description }}
              </p>
            </div>
          </article>
        </div>
      </div>
      <div class="flex gap-6 self-stretch py-3 mt-28 text-xl font-bold leading-none text-white uppercase bg-red-400 max-md:mt-10 max-md:mr-0">
        <div v-for="(item, index) in 5" :key="index" class="flex items-center">
          <span :class="{'text-rose-100': index === 0}" class="grow shrink w-56">little fairy florist</span>
          <div v-if="index < 4" class="flex shrink-0 my-auto w-5 h-5 bg-rose-100 rounded-full"></div>
        </div>
      </div>
    </div>
  </section>

  </MainLayout>
</template>
