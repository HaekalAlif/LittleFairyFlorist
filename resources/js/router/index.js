import { createRouter, createWebHistory } from "vue-router";

import Home from '../views/HomeView.vue';
import Order from '../views/Form.vue';
import NotFoundPage from "../components/NotFoundPage.vue";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/order',
        name: 'Order',
        component: Order
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFoundPage
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;
