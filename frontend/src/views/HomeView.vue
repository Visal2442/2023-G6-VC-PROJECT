<template>
  <div>
    <TheNavbar></TheNavbar>
    <TheBanner></TheBanner>
    <TheCard></TheCard>
    <router-view></router-view>
  </div>
</template>

<script setup>
import TheBanner from "@/components/partials/TheBanner.vue";
import TheCard from '@/components/partials/TheCard.vue';

// @ is an alias to /src
</script>
<style scoped>
.card-container {
  margin-left: 2%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  justify-content: space-evenly;
  margin-top: 5%;
}
</style>
