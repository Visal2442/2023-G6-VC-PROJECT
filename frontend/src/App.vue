<template>
  <div>
    <the-navbar></the-navbar>
    <router-view></router-view>
    <the-footer></the-footer>
  </div>
</template>

<script setup>
import TheNavbar from './components/partials/TheNavbar.vue';
import TheFooter from './components/partials/TheFooter.vue';

</script>

<style>
#app {
  background-color: #f9fcff;
  background-image: linear-gradient(147deg, #f9fcff 0%, #f6f6f6 74%);
  font-family: 'Signika Negative', sans-serif;
}
</style>
