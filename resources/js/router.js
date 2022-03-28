import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// qui va importata la pagina che vogliamo dalla rotta

import Home from "./pages/Home";
import Home from "./pages/About";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },        
    ]
});

export default router