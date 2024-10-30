import "./bootstrap";
import "../css/app.css";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// src/main.js
import { createApp } from "vue";
import App from "./App.vue"; // Mengimpor App.vue sebagai entry point
import router from "./router"; // Mengimpor router yang sudah diatur

const app = createApp(App); // Membuat aplikasi menggunakan App.vue
app.use(router); // Menggunakan router
app.mount("#homeview"); // Memasang aplikasi di elemen dengan ID homeview