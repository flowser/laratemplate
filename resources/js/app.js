
require('./bootstrap');
window.Vue = require('vue');

//editor suport
import 'v-markdown-editor/dist/index.css';

import Vue from 'vue'
import Editor from 'v-markdown-editor'
Vue.use(Editor);

// Support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

//support moment js
import {filter} from './filter'


// Vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import{routes} from './routes';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);

//vform
import { Form, HasError, AlertError } from 'vform'
//make global
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

//sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal

const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast =toast;

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

//vrouter
const router = new VueRouter({
    mode: 'hash', //hash, history
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router,
    store,
});
