
require('./bootstrap');

window.Vue = require('vue');
//import Vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import{routes} from './routes';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

//vform
import { Form, HasError, AlertError } from 'vform'
//make global

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router
});
