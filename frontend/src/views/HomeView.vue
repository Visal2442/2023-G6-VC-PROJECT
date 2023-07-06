<template>
  <TheBanner></TheBanner>
  <div class="card-container">
    <TheCard  v-for="i in 3" :key="i" ></TheCard>
  </div>
</template>

<script setup>
import TheBanner from "@/components/partials/TheBanner.vue"
import TheCard from '@/components/partials/TheCard.vue';

// @ is an alias to /src
</script>
<style >
  .card-container{
    margin-left: 2%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    justify-content: space-evenly;
    margin-top: 5%;
  }
</style>
