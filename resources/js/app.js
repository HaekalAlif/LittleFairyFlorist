import "./bootstrap";
import "../css/app.css";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";

import app from "./components/app.vue";

import router from "./router";

createApp(app).use(router).mount("#app");
