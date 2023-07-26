<template>
  <v-card id="house-card" class="pb-3">
    <div>
      <v-img :src="property?.image" height="200"></v-img>
    </div>
    <div class="d-flex align-center">
      <v-card-title v-if="$route.name == 'Detail'" class="text-lg-h6 text-wrap">{{ property?.name }}</v-card-title>
      <v-card-title v-else class="text-lg-h6 text-wrap">{{ property?.name.slice(0, 10) }}...</v-card-title>
      <v-spacer></v-spacer>
      <div class=" mr-3">
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
      <v-card-subtitle>
        {{ property?.number_of_room }} room{{ property?.number_of_room > 1 ? "s" : ""}}
      </v-card-subtitle>
    </div>
    <v-card-actions class="pa-0">
            <v-card-text class="text-green-accent-4 text-md-body-1">${{ props.property?.price }}/month</v-card-text>
            <v-card-text class="text-end cursor-pointer" @click="isVisible()"><v-icon class="mdi mdi-star mr-1" color="amber-lighten-2"></v-icon>{{ avgRating }} ({{ numberOfRating }})</v-card-text>
            <v-dialog v-model="dialog" transition="dialog-top-transition" persistent width="auto">
                <v-card title="Rate this house !" max-width="400" class="">
                    <v-card-text class=" text-center">
                        <v-rating v-model="rating" density="compact" color="amber-lighten-2" size="70"></v-rating>
                    </v-card-text>
                    <v-card-actions class="px-5 mb-2 d-flex justify-end">
                        <v-btn color="deep-orange-accent-3" @click="dialog = !dialog">Cancel</v-btn>
                        <v-btn color="green-accent-3" @click="rateStar(rating, props.property.id)">Rate Now</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-card-actions>
    <v-card-actions class="px-3">
      <v-icon color="green" size="default" class="mdi mdi-bookmark-outline mr-4" @click="addToWishlist(property.id)">
         <v-tooltip activator="parent" location="top"> Add To Wishlist</v-tooltip>
      </v-icon>
      <v-spacer></v-spacer>
      <BaseButton type="primary-btn" @click="getDetail(property.id)">
        More Detail
      </BaseButton>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { defineProps, defineEmits, ref, onMounted, watch } from "vue";
import BaseButton from "../widget/BaseButton.vue";
import Cookies from 'js-cookie';
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";

// Wishlist Store 
import { useWishlistStore } from '../../store/WishlistStore';
const wishlistStore = useWishlistStore();
const { addWishlist,getWishlist } = wishlistStore;
const cookieEmail = ref(Cookies.get('email'));

const emits = defineEmits(['rateStar', 'alert']);
const props = defineProps(["property"]);

const addToWishlist = (propertyId) => {
  if (cookieEmail.value) {
          const isNotAdded = ref(true);
          const alert = ref({});
          for (const property of getWishlist) {
               if (propertyId == property.property.id) {
                    alert.value = {
                      message:'This house is exist in your Wishlist !',
                      type:'warning'
                    }
                    emits('alert', alert.value)
                    isNotAdded.value = false;
                    break;
                  }
                }
                if (isNotAdded.value) {
                  addWishlist(propertyId);
                  alert.value = {
                      message:'The House is added to your Wishlist !',
                      type:'success'
                    }
                  emits('alert', alert.value)
                }
              }
              else {
                alert.value = {
                      message:'Please Login to your account !',
                      type:'warning'
                    }
                  emits('alert', alert.value)
              }
};

const getDetail = (property_id) => {
    localStorage.setItem('property_id', property_id);
    router.push(`/detail/${property_id}`);
};

// Rating
const isCookieEmail = ref(Cookies.get('email'));
const userId = ref(localStorage.getItem("user_id"));
const rating = ref(null);
const dialog = ref(false);

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
const avgRating = ref(0);
const numberOfRating = ref(0);

watch(avgRating,(newValue )=>{
  avgRating.value = newValue;
})

const getAvgRating=()=>{
  axios.get(`/properties/ratings/${props.property.id}`)
    .then(response => {
        avgRating.value = 0;
        const ratings = response.data.data;
        numberOfRating.value = ratings.length;
        const sum = ratings.reduce((star, ratings) => star + ratings.star, 0);
        const avg = sum / ratings.length;
        if (!isNaN(avg)) {
            avgRating.value = avg.toFixed(1);
        }
    })
    .catch(error => {
        console.log(error.response.data);
    });
}

// Rate the star 
const rateStar = (rate, propertyId) => {
    const house = ref({
        star: rate,
        userId: userId.value,
        propertyId: propertyId
    })
    if (rate < 1) {
        alert('Please rate the house !');
    }
    else {
      getAvgRating();
        emits('rateStar', house.value)
        dialog.value = false;
    }
}

onMounted(()=>{
  getAvgRating();
})

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
