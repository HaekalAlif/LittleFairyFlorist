<template>
    <header class="flex overflow-hidden flex-wrap gap-10 px-14 py-9 font-semibold bg-red-200 max-md:px-5">
      <h1 data-layername="logo" class="text-2xl tracking-tighter text-red-400">
        Little Fairy Florist
      </h1>
      <div class="flex flex-1"></div>
      <nav class="flex gap-10 self-start text-base tracking-tight text-stone-600 justify-end">
        <router-link to="/">Home</router-link>
        <router-link to="/product">Product</router-link>
        <router-link to="/order">Order</router-link>
        <router-link to="/contact">Contact</router-link>
      </nav>
    </header>
  </template>

