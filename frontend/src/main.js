import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// import './axios';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Icons 
import "@mdi/font/css/materialdesignicons.css";
import "@fortawesome/fontawesome-free/css/all.css";
// import icons 
import { mdi } from 'vuetify/iconsets/mdi'
import { aliases, fa } from 'vuetify/iconsets/fa'

// Pinia 
import { createPinia } from 'pinia';
const pinia = createPinia();

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

const app = createApp(App)
app.use(vuetify)
app.use(pinia)
app.use(router)
app.mount('#app')
