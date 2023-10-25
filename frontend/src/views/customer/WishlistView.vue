<template>
  <v-container
    fluid
    class="mr-mr-9"
    :class="getWishlist.length <= 0 ? 'h-screen' : 'h-auto'"
  >
    <v-container>
      <v-row class="d-flex justify-center mb-4" v-if="getWishlist.length > 0">
        <h1>Your Wishlist</h1>
      </v-row>
      <div v-for="property of getWishlist" :key="property">
        <wishlist-card
          :property="property"
          @removeItemFromWishlist="removeItemFromWishlist"
        ></wishlist-card>
      </div>
      <v-row
        class="d-flex justify-center align-center"
        v-if="getWishlist.length <= 0"
      >
        <div class="mb-10">
          <v-img
            :src="require('../../assets/home/EmptyCard.png')"
            class="ma-auto"
            width="40%"
          ></v-img>
          <h1 align="center" class="text-black">Wishlist is Empty</h1>
        </div>
      </v-row>
    </v-container>
  </v-container>
</template>
<script>
import WishlistCard from "../../components/card/WishlistCard.vue";
// Wishlist Store
import { useWishlistStore } from "../../store/WishlistStore";
import { mapActions, mapState } from "pinia";
export default {
  data() {
    return {};
  },
  methods: {
    ...mapActions(useWishlistStore, ["removeWishlist"]),
    removeItemFromWishlist(wishlist_id) {
      this.removeWishlist(wishlist_id);
    },
  },
  computed: {
    ...mapState(useWishlistStore, ["getWishlist"]),
  },
  components: {
    WishlistCard,
  },
};
</script>

<style scoped></style>
