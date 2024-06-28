import './bootstrap';
import {createApp} from 'vue';

import App from './App.vue'
import router from './router/index.js'


import GoogleSignInPlugin from "vue3-google-signin"


const amount = document.getElementById('app').dataset.count
const app = createApp(App,{count: amount});

app
    .use(GoogleSignInPlugin, {clientId: import.meta.env.VITE_CLIENT_ID,})
    .use(router)
    .mount('#app');
