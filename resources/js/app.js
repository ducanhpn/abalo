import './bootstrap';
import {createApp} from 'vue';
import {createPinia} from 'pinia'

import App from './App.vue'
import router from './router/index.js'


const amount = document.getElementById('app').dataset.count
console.log(amount);
const pinia = createPinia();
const app = createApp(App,{count: amount});



app
    .use(pinia)
    .use(router)
    .mount('#app', );
