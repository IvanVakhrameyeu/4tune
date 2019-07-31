
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

import HeaderComponent from './components/HeaderComponent';
import FooterComponent from './components/FooterComponent';
import PromoComponent from './components/PromoComponent';
import GamesComponent from './components/GamesComponent';
import AppComponent from './components/AppComponent';
import NvutiGameComponent from './components/NvutiGameComponent';
import ProfileComponent from './components/ProfileComponent';
import DoubleGameComponent from "./components/DoubleGameComponent";
import JackpotGameComponent from "./components/JackpotGameComponent";
import JackpotGameRoomComponent from "./components/JackpotGameRoomComponent";
import ChatComponent from './components/ChatComponent';

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
Vue.component('chat', ChatComponent);

const routes = [
    {
        path: '/profile',
        component: ProfileComponent,
        name: 'profile'
    },
    {
        path: '/',
        component: GamesComponent,
        name: 'games',
        children: [
            {
                path: '/nvuti',
                component: NvutiGameComponent,
                name: 'nvuti'
            },
            {
                path: '/jackpot',
                component: JackpotGameComponent,
                name: 'jackpot',
                children: [
                    {
                        path: '/jackpot/:room',
                        component: JackpotGameRoomComponent
                    }
                ]
            },
            {
                path: '/double',
                component: DoubleGameComponent,
                name: 'double'
            }
        ]
    }
];

Vue.use(reactiveStorage, {
    "user": {},
    "lang": 'en',
});

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
