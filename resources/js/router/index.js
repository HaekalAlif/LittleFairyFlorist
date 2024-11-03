import { createRouter, createWebHistory } from "vue-router";

import Home from "../views/HomeView.vue";
import Order from "../views/Form.vue";
import Product from "../views/ProductView.vue";
import Contact from "../views/ContactView.vue";
import NotFoundPage from "../components/NotFoundPage.vue";
import Login from "../views/LoginView.vue";
import Dashboard from "../views/admin/DashboardView.vue";
import Orders from "../views/admin/OrdersView.vue";
import AddProduct from "../views/admin/product/AddProductView.vue";
import EditProduct from "../views/admin/product/EditProductView.vue";
import ManageProduct from "../views/admin/product/ManageProductView.vue";
import AddTestimonial from "../views/admin/testimonial/AddTestimonialView.vue";
import EditTestimonial from "../views/admin/testimonial/EditTestimonialView.vue";
import ManageTestimonial from "../views/admin/testimonial/ManageTestimonialView.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/product",
        name: "Product",
        component: Product,
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact,
    },
    {
        path: "/order",
        name: "Order",
        component: Order,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
        meta: { requiresAuth: true },
    },
    {
        path: "/orders",
        name: "orders",
        component: Orders,
    },
    {
        path: "/add-product",
        name: "AddProduct",
        component: AddProduct,
        meta: { requiresAuth: true },
    },
    {
        path: "/edit-product/:id",
        name: "EditProduct",
        component: EditProduct,
        meta: { requiresAuth: true },
        props: true,
    },
    {
        path: "/manage-product",
        name: "ManageProduct",
        component: ManageProduct,
        meta: { requiresAuth: true },
    },
    {
        path: "/add-testimonial",
        name: "AddTestimonial",
        component: AddTestimonial,
        meta: { requiresAuth: true },
    },
    {
        path: "/manage-testimonial",
        name: "ManageTestimonial",
        component: ManageTestimonial,
        meta: { requiresAuth: true },
    },
    {
        path: "/edit-testimonial/:id",
        name: "EditTestimonial",
        component: EditTestimonial,
        meta: { requiresAuth: true },
        props: true,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: NotFoundPage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const authToken = localStorage.getItem("authToken");
    if (to.meta.requiresAuth && !authToken) {
        next("/login");
    } else {
        next();
    }
});

export default router;
