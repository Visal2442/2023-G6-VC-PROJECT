<template>
  <v-container fluid class=" mr-mr-9">
    <v-btn class="bg-orange-accent-3 ml-15" :to="{name:'property'}">Back</v-btn>
    <v-container>
      <v-row class=" d-flex justify-center mb-5">
        <h1>Your Wishlist</h1>
      </v-row>
      <div v-for="property of getWishlist" :key="property">
        <the-wishlist :property="property"></the-wishlist>
      </div>
    </v-container>
  </v-container>
</template>
<script setup>
import TheWishlist from "../components/card/WishlistCard.vue";

import { storeToRefs } from 'pinia';
import { useWishlistStore } from '../store/WishlistStore';

const wishlistStore = useWishlistStore();
const { getWishlist } = storeToRefs(wishlistStore);

</script>
<style scoped>

</style>


