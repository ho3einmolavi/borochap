/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
Vue.component('date-picker', VuePersianDatetimePicker);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-form', require('./components/main.vue').default);
Vue.component('register', require('./components/register.vue').default);
Vue.component('file', require('./components/upload-files.vue').default);
Vue.component('order', require('./components/order.vue').default);
Vue.component('delivery', require('./components/delivery.vue').default);
Vue.component('login', require('./components/login.vue').default);
Vue.component('forget-password', require('./components/forget-password.vue').default);
Vue.component('reset-password', require('./components/reset-password.vue').default);
Vue.component('add-size', require('./components/add-size.vue').default);
Vue.component('add-price', require('./components/add-price.vue').default);
Vue.component('users', require('./components/users.vue').default);
Vue.component('discount', require('./components/add-discount.vue').default);
Vue.component('register1', require('./components/register1.vue').default);
Vue.component('setting', require('./components/setting.vue').default);
Vue.component('factor', require('./components/factor.vue').default);
Vue.component('order-list', require('./components/order-list.vue').default);
Vue.component('order-details', require('./components/order-details.vue').default);
Vue.component('turning', require('./components/turning.vue').default);
Vue.component('pay', require('./components/pay.vue').default);
Vue.component('discount-type3', require('./components/discount-type3.vue').default);
Vue.component('update-variables', require('./components/update-variables.vue').default);
Vue.component('user-panel', require('./components/user-panel.vue').default);
Vue.component('user-orders-list', require('./components/user-orders-list.vue').default);
Vue.component('user-wallet', require('./components/user-wallet.vue').default);
Vue.component('user-change-password', require('./components/user-change-password.vue').default);
Vue.component('user-order-details', require('./components/user-order-details.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueSweetalert2 from 'vue-sweetalert2';
import Vue from 'vue'
import VueRouter from 'vue-router'
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueRouter);

const routes = [
    { path: '/user/orders', component: Vue.component('user-orders-list', require('./components/user-orders-list.vue').default)},
    { path: '/user/wallet', component: Vue.component('user-orders-list', require('./components/user-wallet.vue').default)},
    { path: '/user/change-password', component: Vue.component('user-orders-list', require('./components/user-change-password.vue').default)},
    { path: '/user/order-details/:orderID', component: Vue.component('user-orders-list', require('./components/user-order-details.vue').default)},
];

const router = new VueRouter({
    mode: 'history' ,
    routes // short for `routes: routes`
});



Vue.use(VueSweetalert2);
const app = new Vue({
    el: '#app',
    router
});

const app1 = new Vue({
    el: '#app1',
});

const app2 = new Vue({
    el: '#app2',
});

const app3 = new Vue({
    el: '#app3',
});

const app4 = new Vue({
    el: '#app4',
});

const app6 = new Vue({
    el: '#app6',
});