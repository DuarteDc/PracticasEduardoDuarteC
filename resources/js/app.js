

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
axios.defaults.baseURL='http://127.0.0.1:8000/api/';
Vue.component('materias', require('./components/Materias/MateriasComponent.vue').default);
const app = new Vue({ 
    el: '#app',

});