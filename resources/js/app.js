import './bootstrap';
import {createApp} from 'vue';

import App from './App.vue'
import router from './router/index.js'


import GoogleSignInPlugin from "vue3-google-signin"


const amount = document.getElementById('app').dataset.count
const app = createApp(App,{count: amount});


app
    .use(GoogleSignInPlugin, {clientId: '272153221507-0tgkb5tqc3g8lpc10jgbd5rf5ij4upl5.apps.googleusercontent.com',})
    .use(router)
    .mount('#app');
