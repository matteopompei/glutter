require('./bootstrap');

// Axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Vue
import Vue from 'vue';
window.Vue = require('vue');
import App from './App.vue';

// Event Bus
// export const bus = new Vue();

// Router
import router from "./router";

// Vuex
import Vuex from 'vuex';
window.Vuex = require('vuex');
Vue.use(Vuex)
import store from './store.js'

const app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
  store: new Vuex.Store(store),
});