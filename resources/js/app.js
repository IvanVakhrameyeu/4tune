
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import reactiveStorage from "vue-reactive-storage";

window.Vue.use(VueRouter);

import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
import PromoComponent from './components/PromoComponent.vue';
import GamesComponent from './components/GamesComponent.vue';
import AppComponent from './components/AppComponent.vue';
import NvutiGameComponent from './components/NvutiGameComponent.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the pages. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('promo', PromoComponent);
Vue.component('games', GamesComponent);
Vue.component('app-header', HeaderComponent);
Vue.component('app-footer', FooterComponent);
Vue.component('app', AppComponent);
Vue.component('nvuti', NvutiGameComponent);

const routes = [

    {
        path: '/nvuti',
        component: NvutiGameComponent,
        name: 'nvuti'
    }
];

Vue.use(reactiveStorage, {
    "user": {},
    "lang": 'en',
});

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
