import { createRouter, createWebHistory } from "vue-router";

import home from '../components/HomePage.vue';
import about from '../components/AboutPage.vue';
import notFound from '../components/NotFoundPage.vue';
import Form from '../components/Form.vue';

const routes = [
    {
        path: '/',
        component: home,
    },
    {
        path: '/about',
        component: about
    },
    {
        path: '/form',
        component: Form
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router