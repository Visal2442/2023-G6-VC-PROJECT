<template>
  <v-card id="house-card" class="pb-3">
    <!-- <TheTransition>
            <v-alert type="error" v-if="isLoggedIn" closable class="text-red-accent-4 text-left mb-5" :text='errorMessage'>
            </v-alert>
        </TheTransition> -->
    <div>
      <v-img :src="property?.image" height="200"></v-img>
    </div>
    <div class="d-flex align-center">
      <v-card-title class="text-lg-h6">{{ property?.name }}</v-card-title>
      <v-spacer></v-spacer>
      <div>
        <p
          class="title text-caption rounded-pill pl-2 pr-2"
          :class="property?.available? 'text-blue bg-blue-lighten-4' : 'text-red bg-red-lighten-4'"
        >
          {{ property?.available? "Available" : "Unavailable" }}
        </p>
      </div>
    </div>
    <div class="d-flex align-center">
      <v-card-subtitle
        >{{ property?.number_of_kitchen }} kitchen{{
          property?.number_of_kitchen > 1 ? "s" : ""
        }}</v-card-subtitle
      >
      <v-card-subtitle
        >{{ property?.number_of_bathroom }} bathroom{{
          property?.number_of_bathroom > 1 ? "s" : ""
        }}</v-card-subtitle
      >
      <v-card-subtitle
        >{{ property?.number_of_room }} room{{
          property?.number_of_room > 1 ? "s" : ""
        }}</v-card-subtitle
      >
    </div>
    <v-card-actions class="pa-0">
      <v-card-text class="text-green-accent-4 text-md-body-1"
        >${{ property?.price }}/month</v-card-text
      >
      <v-rating
        v-model="rating"
        density="compact"
        bg-color="orange-lighten-1"
      ></v-rating>
    </v-card-actions>
    <v-card-actions>
      <div class="d-flex align-center">
        <v-icon
          @click="addToWishlist(property.id)"
          color="green"
          size="default"
          class="mr-4 boder"
          icon="mdi mdi-bookmark"
        ></v-icon>
      </div>
      <v-spacer></v-spacer>
      <BaseButton type="primary-btn" @click="getDetail(property.id)"
        >More Detail</BaseButton
      >
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { defineProps, defineEmits, ref } from "vue";
import BaseButton from "../widget/BaseButton.vue";
import Cookies from 'js-cookie';
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";

const emits = defineEmits(['addToWishlist', 'rateStar']);
const props = defineProps(["property"]);

const addToWishlist = (property_id) => {
  emits("addToWishlist", property_id);
};

const getDetail = (property_id) => {
  router.push(`/detail/${property_id}`);
};


// Rating
const isCookieEmail = ref(Cookies.get('email'));
const user_id = ref(localStorage.getItem("user_id"));
const rating = ref(null);
const dialog = ref(false)

const isVisible = () => {
    if (isCookieEmail.value) {
        dialog.value = true;
        rating.value = null;
    }
    else {
        dialog.value = false;
        alert('Please Login to your account !');
    }
}


// average star of house 
const avgRating = ref(null);
axios.get(`/properties/ratings/${props.property.id}`)
    .then(response => {
        avgRating.value = 0;
        const ratings = response.data.data;
        console.log(ratings);
        const sum = ratings.reduce((star, ratings) => star + ratings.star, 0);
        const avg = sum / ratings.length;
        if (!isNaN(avg)) {
            avgRating.value = avg.toFixed(1);
        }
    })
    .catch(error => {
        console.log(error.response.data);
    });

// Rate the star 
const rateStar = (rate, property_id) => {
    const house = ref({
        star: rate,
        user_id: user_id.value,
        property_id: property_id
    })
    if (rate < 1) {
        alert('Please rate the house !');
    }
    else {
        emits('rateStar', house.value)
        dialog.value = false;
    }
}
</script>

<style scoped>
#house-card {
  border-radius: 12px;
}

.seconday-btn {
  border: 1px solid #00e676;
  margin-left: 2px;
}
</style>
