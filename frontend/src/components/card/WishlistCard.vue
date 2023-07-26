<template>
      <v-row class="card rounded-xl" elevation="5">
        <v-col class="img">
          <img :src="property.property.image" class="rounded-lg">
        </v-col>
        <v-col class="d-flex flex-column justify-start">
          <div class=" d-flex justify-space-between mb-2">
            <p class="title text-capitalize text-blue-accent-4 bg-blue-lighten-4 rounded-pill px-3">{{
              property.property.type }}</p>
            <v-icon class="mdi mdi-delete" @click="removeItem(property.wishlist_id)" color="red">
                <v-tooltip activator="parent" location="top"> Remove From Wishlist</v-tooltip>
            </v-icon>
          </div>
          <h3 class="text-capitalize mb-4">{{ property.property.name }}</h3>
          <div class=" d-flex align-center mb-2">
            <img src="https://cdn-icons-png.flaticon.com/512/1865/1865269.png" width="20" height="20" alt=""
              class="location mr-3">
            <v-card-text class="pa-0">{{ property.property.district.title }}</v-card-text>
          </div>
          <div class="d-flex align-center">
            <v-card-subtitle class="pa-0">{{ property.property.number_of_kitchen }} kitchen{{
              property.property.number_of_kitchen > 1 ? "s" : ""
            }}</v-card-subtitle>
            <v-card-subtitle>{{ property.property.number_of_bathroom }} bathroom{{
              property.property.number_of_bathroom > 1 ? "s" : ""
            }}</v-card-subtitle>
            <v-card-subtitle>{{property.property.number_of_room }} room{{
              property.property.number_of_room > 1 ? "s" : ""
            }}</v-card-subtitle>
          </div>
          <div class="d-flex justify-space-between align-center mb-2">
            <v-card-text class="cursor-pointer pa-0"><v-icon class="mdi mdi-star mr-1" color="amber-lighten-2"></v-icon>{{ avgRating }} ({{ numberOfRating }})</v-card-text>
            <p class="price">${{ property.property.price }}/Month</p>
          </div>
          <BaseButton type="primary-btn" @click="getDetail(property.property.id)">More Detail</BaseButton>
        </v-col>
      </v-row>
</template>
     
<script setup>
import { defineProps, defineEmits, ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import BaseButton from '../widget/BaseButton.vue';

const emits= defineEmits(['removeItemFromWishlist']);
const props = defineProps(['property']);

const removeItem =(wishlist_id)=>{
  emits('removeItemFromWishlist', wishlist_id);
}

const router = useRouter();
const getDetail = (property_id) => {
    router.push(`/detail/${property_id}`);
};

// average star of house 
const avgRating = ref(null);
const numberOfRating = ref(0);
axios.get(`/properties/ratings/${props.property.property.id}`)
    .then(response => {
        avgRating.value = 0;
        numberOfRating.value = 0;
        const ratings = response.data.data;
        numberOfRating.value = ratings.length;
        const sum = ratings.reduce((star, ratings) => star + ratings.star, 0);
        const avg = sum / ratings.length;
        if (!isNaN(avg)) {
            avgRating.value = avg.toFixed(1);
        }
    })
    .catch(error => {
        console.log(error);
    });

</script>
     
<style scoped>
.card {
  margin: 10px auto;
  width: 70%;
  border-radius: 10px;
  transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

.img,
img {
  width: 90%;
  height: 60%;
}

.img {
  width: 80%;
}

.star {
  display: flex;
  flex-direction: row;
  color: rgb(248, 245, 83);
}

.button {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 10px;
  width: 90%;
  margin-top: -65px;
}

.card,
.button {
  justify-content: end;
}

.price {
  font-size: larger;
  color: #2ecc71;
  transition: color 0.3s ease-in-out;
}

.location {
  width: 20px;
  height: 20px;
}

.flower {
  width: 15px;
  height: 15px;
}

/* .card-center {
  align-items: center;
  margin-left: 50px;
} */

.title {
  color: blue;
}
</style>