import { createApp } from 'vue';
import { setDefaultHeaders, setDefaultBaseUrl } from '@/utils/fetchJson.js';
import App from './App.vue';
import './styles/matrix-theme.css'

const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';

setDefaultHeaders({'X-CSRF-TOKEN': csrfToken});
const urlApi = document.querySelector('meta[name="api-base-url"]')?.getAttribute('content') ?? '';
setDefaultBaseUrl(urlApi);

const myApp = createApp(App);
myApp.mount('#app');