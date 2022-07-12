import {createApp} from 'vue';
import App from './js/App.vue';
import {createRouter, createWebHistory} from 'vue-router';
import {createAuth} from "@websanova/vue-auth";
import axios from "axios";
import driverAuthBearer      from '@websanova/vue-auth/src/drivers/auth/bearer.js';
import driverHttpAxios       from '@websanova/vue-auth/src/drivers/http/axios.1.x.js';
import driverRouterVueRouter from '@websanova/vue-auth/src/drivers/router/vue-router.2.x.js';
import bulma from 'bulma';

import clientRoutes from "./js/routes/client";

const router = createRouter({
    history: createWebHistory(),
    routes: clientRoutes
});

const auth = createAuth({
    plugins: {
        http: axios,
        router: router
    },
    drivers: {
        http: driverHttpAxios,
        auth: driverAuthBearer,
        router: driverRouterVueRouter
    },
    options: {
        rolesKey: 'type',
        notFoundRedirect: {name: 'user-account'},
    }
});

const app = createApp(App);
app.use(router);
app.use(auth);
app.mount('#app');


console.log('Boring JavaScript file: make me cooler!');
