<template>
  <v-container fluid class=" mr-mr-9" :class="getWishlist.length<= 0 ? 'h-screen' : 'h-auto'">
    <v-btn class="bg-orange-accent-3 ml-15" :to="{ name: 'property' }">Back</v-btn>
    <v-container>
      <v-row class=" d-flex justify-center mb-4">
        <h1>Your Wishlist</h1>
      </v-row>
      <div v-for="property of getWishlist" :key="property">
        <wishlist-card :property="property" @removeItemFromWishlist="removeItemFromWishlist"></wishlist-card>
      </div>
      <v-row class="h-50 pa-15 d-flex justify-center align-center" v-if="getWishlist.length <= 0">
        <div class="justify-center pa-2">
          <v-img :src="require('../assets/home/EmptyCard.png')" width="400"></v-img>
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


