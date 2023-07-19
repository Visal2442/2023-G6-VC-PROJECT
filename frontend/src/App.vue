<template>
  <div>
    <!-- FOR CUSTOMER PAGE  -->
    <the-navbar v-if="!route.path.includes('dashboard')"></the-navbar>
    <!-- RESOURCE : https://www.youtube.com/watch?v=X4I6zUEM40A -->
    <router-view v-slot="{ Component }">
      <div v-if="!route.path.includes('dashboard')">
        <transition name="route" mode="out-in">
          <component :is="Component"></component>
        </transition>
      </div>
    </router-view>
    <the-footer v-if="!route.path.includes('dashboard')"></the-footer>

    <!-- FOR ADMIN PAGE  -->
    <v-app>
      <dashboard-navbar v-if="route.path.includes('dashboard')"></dashboard-navbar>
      <v-main>
        <!-- <dashboard-header></dashboard-header> -->
        <router-view />
      </v-main>
    </v-app>
  </div>
</template>

<script setup>
// import DashboardHeader from './components/partials/DashboardHeader.vue'
import DashboardNavbar from './components/partials/DashboardSidebar.vue';
import TheFooter from './components/partials/TheFooter.vue';
import { useRoute } from 'vue-router';
const route = useRoute()
</script>

<style scoped>
#app {
  background-color: #f9fcff;
  background-image: linear-gradient(147deg, #f9fcff 0%, #f6f6f6 74%);
  font-family: 'Signika Negative', sans-serif;
}

/* route transition  */
.route-enter-from {
  opacity: 0;
  transform: translateX(100px);
}

.route-enter-active {
  transition: all 0.3s ease-out;
}

.route-leave-to {
  opacity: 0;
  transform: translateX(-100px);
}

.route-leave-active {
  transition: all 0.3s ease-in;
}
</style>
