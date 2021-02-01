import Vue from 'vue';
import VueTailwind from 'vue-tailwind';
import * as components from 'vue-tailwind/dist/components';

require('./bootstrap');

// Register Vue
window.Vue = require('vue').default;

// Register Vue Plugins
Vue.use(VueTailwind, components);

// Register Components
Vue.component('app', require('./components/App.vue').default);

// Create Instance
// eslint-disable-next-line no-unused-vars
const app = new Vue({
  el: '#app',
});
