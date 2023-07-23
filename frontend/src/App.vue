<template>
  <div>
    <!-- FOR CUSTOMER PAGE  -->
    <the-navbar v-if="!route.path.includes('dashboard')"></the-navbar>
    <!-- RESOURCE : https://www.youtube.com/watch?v=X4I6zUEM40A -->
    <div v-if="!route.path.includes('dashboard')">
      <router-transition></router-transition>
    </div>
    <the-footer v-if="!route.path.includes('dashboard')"></the-footer>

    <!-- FOR ADMIN PAGE  -->
    <v-app v-if="route.path.includes('dashboard')">
      <dashboard-sidebar></dashboard-sidebar>
      <v-main>
        <dashboard-header></dashboard-header>
        <router-transition></router-transition>
      </v-main>
    </v-app>
  </div>
</template>

<script setup>
import DashboardSidebar from './components/partials/DashboardSidebar.vue';
import TheFooter from './components/partials/TheFooter.vue';
import RouterTransition from './components/widget/RouterTransition.vue'
import { useRoute } from 'vue-router';
const route = useRoute()

// Callback function 
const showLocation = (location) => {
  localStorage.setItem('currentLat', location.coords.latitude);
  localStorage.setItem('currentLng', location.coords.longitude);
}
const showError = (error) => {
  console.log(error);
}
// Get current location 
navigator.geolocation.getCurrentPosition(showLocation, showError);
</script>

<style>
#app {
  background-color: #f9fcff;
  background-image: linear-gradient(147deg, #f9fcff 0%, #f6f6f6 74%);
  font-family: 'Signika Negative', sans-serif;
}
.v-icon {
    cursor: pointer;
}
</style>
