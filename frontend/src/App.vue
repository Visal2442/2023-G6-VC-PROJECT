<template>
  <!-- <TheNavbar></TheNavbar> -->
  <router-view/>
  <TheFooter></TheFooter>
</template>


<script setup>
// import TheNavbar from '@/components/partials/TheNavbar.vue'
import TheFooter from '@/components/partials/TheFooter.vue';
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
