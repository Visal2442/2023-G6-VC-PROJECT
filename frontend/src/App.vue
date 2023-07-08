<template>
  <div>
    <TheNavbar></TheNavbar>
  <router-view></router-view>
  <TheFooter></TheFooter>
  </div>
</template>


<script setup>
// import TheNavbar from '@/components/partials/TheNavbar.vue'
import TheFooter from '@/components/partials/TheFooter.vue';

import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { isLoggedIn } = storeToRefs(authStore);
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-active {
  color: #42b983;
}
</style>
