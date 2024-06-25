import './bootstrap';
import {createApp} from 'vue';

import App from './App.vue'
import router from './router/index.js'


const amount = document.getElementById('app').dataset.count
const app = createApp(App,{count: amount});


app
    .use(router)
    .mount('#app');
