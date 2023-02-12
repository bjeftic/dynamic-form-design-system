require('./bootstrap');
import PicoCSS from '@picocss/pico';
import flatpickr from 'flatpickr';
import "flatpickr/dist/flatpickr.min.css";
import router from "./router";

window.Vue = require('vue').default;


Vue.component('app', require('./pages/App.vue').default);

const app = new Vue({
    el: '#app',
    PicoCSS,
    flatpickr,
    router
});
