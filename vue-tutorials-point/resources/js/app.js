
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

require('./bootstrap');

window.Vue = require('vue');

// --------------------------------------------------------------------------------------------
// thi command run to install sweetAlert (npm install -S vue-sweetalert2)
// import VueSweetalert2 from "vue-sweetalert2";
// Vue.use(VueSweetalert2);

// import Swal from "sweetalert2";
// Vue.use(Swal)

// import Swal from 'sweetalert2/dist/sweetalert2.js'
// import 'sweetalert2/src/sweetalert2.scss'
// ----------------------------------------------------------------------------------------------

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('main-component', require('./Main.vue').default);

import router from './router/index'
const app = new Vue({
    el: '#app',
    router
});
