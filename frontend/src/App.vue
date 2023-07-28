<template>
  <div>
    <!-- FOR CUSTOMER PAGE  -->
    <the-navbar v-if="!route.path.includes('dashboard') && !route.path.includes('not_found')"></the-navbar>
    <!-- RESOURCE : https://www.youtube.com/watch?v=X4I6zUEM40A -->
    <div v-if="!route.path.includes('dashboard')">
      <router-transition></router-transition>
    </div>
    <the-footer v-if="!route.path.includes('dashboard') && !route.path.includes('not_found')"></the-footer>

    <!-- FOR ADMIN PAGE  -->
    <v-app v-if="route.path.includes('/dashboard/admin') || route.path.includes('/dashboard/landlord') ">
      <dashboard-sidebar></dashboard-sidebar>
      <v-main>
        <dashboard-header></dashboard-header>
        <router-transition></router-transition>
      </v-main>
    </v-app>
  </div>
</template>

<script setup>
import DashboardSidebar from './components/partials/TheDashboardSidebar.vue';
import TheFooter from './components/partials/TheFooter.vue';
import RouterTransition from './components/widget/RouterTransition.vue'
import { useRoute } from 'vue-router';
import axios from 'axios';
const route = useRoute();

// Callback function 
// Get current location 
axios.get('https://api.geoapify.com/v1/ipinfo?apiKey=a194a08645c34558b344958fc6aff70c')
  .then(res=>console.log(res))
  .catch(err=>console.log(err))

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
@import url('https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;400;500;600;700&family=Signika:wght@300&display=swap');
#app {
  background-color: #f9fcff;
  background-image: linear-gradient(147deg, #f9fcff 0%, #f6f6f6 74%);
  font-family: 'Signika Negative', sans-serif;

}
.v-icon {
    cursor: pointer;
}
</style>
