Vue.use(VueRouter);
import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home";
import SingleUser from "./pages/SingleUser";
import Error404 from "./pages/Error404";
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
        {   path: "/:pathMatch(.*)*",
            name: "error404",
            component: Error404
        }
    ]
});

export default router
