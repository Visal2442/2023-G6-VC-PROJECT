import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './axios-http'
import TheNavbar from './components/partials/TheNavbar.vue'
// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Icons 
import "@mdi/font/css/materialdesignicons.css";
import "@fortawesome/fontawesome-free/css/all.css";
import { mdi } from 'vuetify/iconsets/mdi'
import { aliases, fa } from 'vuetify/iconsets/fa'

// import './style.css'
// Vuetify 
const vuetify = createVuetify({
    icons:{
        defaultSet:'fa',
        aliases,
        sets:{
            fa,
            mdi,
        }
    },
  components,
  directives,
})

// Pinia 
import { createPinia } from 'pinia';
const pinia = createPinia();

// Google login 
import vue3GoogleLogin from 'vue3-google-login';
const CLIENT_ID = '407027706473-pdvs2mj4qeei8ajpn9tok7gdmiqqfgd7.apps.googleusercontent.com';

const app = createApp(App)
app.use(vuetify)
app.use(pinia)
app.use(router)
app.use(vue3GoogleLogin, {
    clientId: CLIENT_ID,
})
app.mount('#app')
