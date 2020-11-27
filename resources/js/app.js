require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

import ExampleComponent from './components/ExampleComponent.vue';
Vue.component('example-component', ExampleComponent);

const app = new Vue({
    el: '#app'
});
