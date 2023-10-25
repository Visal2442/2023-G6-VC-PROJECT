import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import { loadFonts } from "./plugins/webfontloader";
import "./axios-http";
import mixins from "./mixins";

import TheNavbar from "./components/partials/TheNavbar.vue";
import TheDashboardHeader from "./components/partials/TheDashboardHeader.vue";

// Pinia
import { createPinia } from "pinia";
const pinia = createPinia();

// Google login
// import vue3GoogleLogin from 'vue3-google-login';
// const CLIENT_ID = "407027706473-pdvs2mj4qeei8ajpn9tok7gdmiqqfgd7.apps.googleusercontent.com"

loadFonts();

const app = createApp(App);
app.use(vuetify);
app.mixin({ ...mixins });
app.component("TheNavbar", TheNavbar),
  app.component("DashboardHeader", TheDashboardHeader),
  app.use(router);
app.use(pinia);
// app.use(vue3GoogleLogin, {
//   clientId: CLIENT_ID
// })
app.mount("#app");
