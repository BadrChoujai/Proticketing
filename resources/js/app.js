import Vue from 'vue';
import Dashboard from './components/Dashboard.vue';
import { Chart } from 'chart.js';
import Chartkick from 'vue-chartkick';

Vue.use(Chartkick.use(Chart));
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.component('dashboard', Dashboard);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
	el: '#layoutSidenav'
});
