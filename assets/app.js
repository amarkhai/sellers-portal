import {createApp} from 'vue';
import App from './js/App.vue';
import {createRouter, createWebHistory} from 'vue-router';
import bulma from 'bulma';

import clientRoutes from "./js/routes/client";

const router = createRouter({
    history: createWebHistory(),
    routes: clientRoutes
});

const app = createApp(App);
app.use(router);
app.mount('#app');


console.log('Boring JavaScript file: make me cooler!');
