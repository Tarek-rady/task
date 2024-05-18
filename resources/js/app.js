import './bootstrap';
import { createApp } from 'vue';
import login from './auth/login.vue' ;

const app = createApp({});
app.component('login-component' , login);
app.mount('#app');
