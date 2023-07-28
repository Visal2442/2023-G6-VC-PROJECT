<template>
  <div id="not">
    <v-container class="h-screen bg-white d-flex justify-center align-center flex-column pb-16">
      <v-img :src="require('../../assets/not_found/404.gif')" width="1000"></v-img>
      <div>
        <base-button prepend-icon="mdi-arrow-left" type="primary-btn" :to="{ name: 'Home' }">Go Back Home</base-button>
      </div>
    </v-container>
  </div>
</template>

<script setup>
import BaseButton from "@/components/widget/BaseButton.vue";
</script>

<style scoped>
#not {
  background: white;
}
</style>