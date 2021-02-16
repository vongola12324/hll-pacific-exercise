import Vue from 'vue';
import VueTailwind from 'vue-tailwind';
import Vue2SimpleDatatable from 'vue2-simple-datatable';
import components from './tailwind';

require('./bootstrap');

// Register Vue
window.Vue = require('vue').default;

// Register Vue Plugins
Vue.use(VueTailwind, components);
Vue.use(Vue2SimpleDatatable);

// Register Components
Vue.component('welcome-page', require('./components/WelcomePage.vue').default);
Vue.component('next-page', require('./components/NextPage.vue').default);
Vue.component('history-page', require('./components/HistoryPage.vue').default);

// Create Instance
// eslint-disable-next-line no-unused-vars
const app = new Vue({
  el: '#app',
});
