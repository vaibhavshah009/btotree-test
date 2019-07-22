/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import axios from 'axios';

window.Vue = require('vue');
window.axios = axios;

Vue.component('task-list', require('./components/Task-list.vue').default);

const app = new Vue({
    el: '#app'
});

