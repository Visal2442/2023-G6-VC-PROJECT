<template>
  <v-container fluid class=" mr-mr-9" :class="getWishlist.length<= 0 ? 'h-screen' : 'h-auto'">
    <v-container>
      <v-row class=" d-flex justify-center mb-4" v-if="getWishlist.length > 0">
        <h1>Your Wishlist</h1>
      </v-row>
      <div v-for="property of getWishlist" :key="property">
        <wishlist-card :property="property" @removeItemFromWishlist="removeItemFromWishlist"></wishlist-card>
      </div>
      <v-row class="d-flex justify-center align-center" v-if="getWishlist.length <= 0">
        <div class="mb-10">
          <v-img :src="require('../assets/home/EmptyCard.png')" class="ma-auto" width="40%"></v-img>
          <h1 align="center" class="text-black">Wishlist is Empty</h1>
        </div>
      </v-row>
    </v-container>
  </v-container>
</template>
<script setup>
import WishlistCard from "../components/card/WishlistCard.vue";

// Wishlist Store 
import { useWishlistStore } from '../store/WishlistStore';
import { storeToRefs } from "pinia";
const wishlistStore = useWishlistStore();
const { removeWishlist } = wishlistStore;
const { getWishlist } = storeToRefs(wishlistStore);

const removeItemFromWishlist = (wishlist_id) => {
  removeWishlist(wishlist_id);
}

</script>

<style scoped>

</style>


