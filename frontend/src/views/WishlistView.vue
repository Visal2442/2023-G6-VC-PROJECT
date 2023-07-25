<template>
  <v-container fluid class=" mr-mr-9" :class="getWishlist ? 'h-screen' : ''">
    <v-btn class="bg-orange-accent-3 ml-15" :to="{ name: 'property' }">Back</v-btn>
    <v-container>
      <v-row class=" d-flex justify-center mb-5">
        <h1>Your Wishlist</h1>
      </v-row>
      <div v-for="property of getWishlist" :key="property">
        <wishlist-card :property="property" @removeItemFromWishlist="removeItemFromWishlist"></wishlist-card>
      </div>
      <v-row class="h-50 pa-15 d-flex justify-center align-center" v-if="getWishlist.length <= 0">
        <div>
          <h1 class="text-center">No Properties</h1>
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
const { removeWishlist, getAllData } = wishlistStore;
const { getWishlist } = storeToRefs(wishlistStore);

const removeItemFromWishlist = (wishlist_id) => {
  removeWishlist(wishlist_id);
  getAllData();
}

</script>

<style scoped>

</style>


