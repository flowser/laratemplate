
require('./bootstrap');

window.Vue = require('vue');
//import Vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import{routes} from './routes';
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router
});
