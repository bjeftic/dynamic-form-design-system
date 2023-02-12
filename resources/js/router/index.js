import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../pages/Index.vue";
import CreateForm from "../pages/CreateForm.vue";
import ViewForm from "../pages/ViewForm.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "page-index",
        component: Index,
    },
    {
        path: "/create-form",
        name: "page-create",
        component: CreateForm,
    },
    {
        path: "/view-form/:id",
        name: "page-view",
        component: ViewForm,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 };
        }
    },
});

export default router;