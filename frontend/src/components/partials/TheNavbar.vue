<template>
  <div>
    <!-- Small Screen  -->
    <v-layout>
    <v-navigation-drawer v-model="sidebar" temporary>
      <v-list>
        <v-list-item v-for="item in menuItems" :key="item.title" :to="{ name: item.name }">
          <v-list-item-title>
            {{ item.title }}
          </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    </v-layout>

    <!-- Large Screen  -->
    <v-toolbar color="green lighten-1" class="mb-5">
      <span class="hidden-sm-and-up">
        <v-app-bar-nav-icon @click="sidebar = !sidebar"></v-app-bar-nav-icon>
      </span>
      <v-toolbar-title class="text-uppercase font-weight-bold mr-4 ">
        <picture>
          <img src="../../assets/logo.png" alt="Logo" width="50" aspect-ratio="1/1">
        </picture>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-xs">
        <v-btn class="mr-4" :to="{ name: 'Home' }">Home</v-btn>
        <v-btn class="mr-4" :to="{ name: 'Home' }">Property</v-btn>
        <v-btn class="mr-4" :to="{ name: 'About' }">About</v-btn>
      </v-toolbar-items>
      <v-btn class="tex-left" :to="{ name: 'Register' }">Register</v-btn>
      <v-btn class="mr-4" :to="{ name: 'Login' }">Login</v-btn>
    </v-toolbar>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const sidebar = ref(false);
const menuItems = ref([
  { title: 'Home', name: 'Home' },
  { title: 'Property', name: 'Home' },
  { title: 'About', name: 'About' },
])


</script>

<style scoped>
img {
  border-radius: 50%;
  margin-right: 70%;
  margin-top: 3%;
}
</style>