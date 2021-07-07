
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';
import Example from './components/Example.vue';
import InstantSearch from 'vue-instantsearch';
import AlgoliaVueSearch from './components/AlgoliaVueSearch';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('example-component', Example);
Vue.component('algolia-vue-search', AlgoliaVueSearch);
Vue.use(InstantSearch);

const app = new Vue({
    el: '#app'
});
