Vue.use(VueRouter);
import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home";
import SingleUser from "./pages/SingleUser";
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/restaurant/:id",
            name: "singleuser",
            component: SingleUser
        },
    ]
});

export default router
