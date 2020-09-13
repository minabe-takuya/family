/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//index.phpの時だけVueの処理をしたい
import Vue from 'vue';
//import Gurunabi from "./components/Gurunabi.vue";
Vue.config.productionTip = false
//render関数の方を使用することにした
// const app = new Vue({
//     el: '#app',
// });
const app = new Vue({
    el: '#app',
})
//下はサイトからコピってきた
    // new Vue({
    //     render: h => h(App),
    // }).$mount('#app')
//jQueryでパララックスデザインの処理
$(function () {

    // フロートヘッダーメニュー
    var targetHeight = $('.js-float-menu-target').height();
    $(window).on('scroll', function() {
        $('.js-float-menu').toggleClass('float-active', $(this).scrollTop() > targetHeight);
    });

    // SPメニュー
    $('.js-toggle-sp-menu').on('click', function () {
        $(this).toggleClass('active');
        $('.js-toggle-sp-menu-target').toggleClass('active');
    });
});
