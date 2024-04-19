import './bootstrap';
import './functions/axiosHelper';
import './functions/localStorage';

import "bootstrap/dist/css/bootstrap.min.css"

import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios'

import VueAxios from 'vue-axios'
import router from './routes'

import Card from './modules/card/Card';

window.productAnkor = 'product_ankor'

createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .use(Card)
    .mount('#app');
