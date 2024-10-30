import "./bootstrap";
import "../css/app.css";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";

import landing from "../js/views/HomeView.vue";

import router from "./router";

createApp(landing).use(router).mount("#homeview");
