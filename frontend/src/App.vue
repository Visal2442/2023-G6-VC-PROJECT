<template>
  <div>
    <the-navbar></the-navbar>
    <!-- RESOURCE : https://www.youtube.com/watch?v=X4I6zUEM40A -->
    <router-view v-slot="{ Component }">
      <transition name="route" mode="out-in">
        <component :is="Component"></component>
      </transition>
    </router-view>
    <the-footer></the-footer>
  </div>
</template>

<script setup>
import TheFooter from './components/partials/TheFooter.vue';

</script>

<style scoped>
#app {
  background-color: #f9fcff;
  background-image: linear-gradient(147deg, #f9fcff 0%, #f6f6f6 74%);
  font-family: 'Signika Negative', sans-serif;
}
/* route transition  */
.route-enter-from{
  opacity:0;
  transform: translateX(100px);
}
.route-enter-active{
  transition: all 0.3s ease-out;
}
.route-leave-to{
  opacity: 0;
  transform: translateX(-100px);
}
.route-leave-active{
  transition: all 0.3s ease-in;
}
</style>
