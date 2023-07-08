<template>
  <!-- Small Screen  -->
  <!-- <v-navigation-drawer>
        <v-list>
            <v-list-item>
                <v-list-item-title>
                    Home
                </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer> -->

  <!-- Large Screen  -->

  <v-toolbar color="green lighten-1" class="mb-5">
    <v-toolbar-title class="text-uppercase font-weight-bold mr-4 ">
      <picture>
        <img src="../../assets/logo.png" alt="Logo" width="50" aspect-ratio="1/1">
      </picture>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn class="mr-4" :to="{name:'Home'}">Home</v-btn>
      <v-btn class="mr-4" :to="{name:'Home'}">Property</v-btn>
      <v-btn class="mr-4" :to="{name:'About'}">About</v-btn>
      <v-btn class="mr-4" :to="{name:'Map'}">Map</v-btn>
    </v-toolbar-items>
      <v-btn class="tex-left" :to="{name:'Register'}" v-if="token==null">Register</v-btn>
      <v-btn class="mr-4">Login</v-btn>
  <h1>{{ token }}</h1>
  </v-toolbar>
</template>

<script setup>
import { computed } from 'vue';
let tokens = '';
const token = computed({
  get:()=>{
    tokens = localStorage.getItem('token');
    return tokens
  }
})
console.log(localStorage.getItem('token'));


</script>

<style scoped>
img {
  border-radius: 50%;
  margin-right: 70%;
  margin-top: 3%;
}
</style>