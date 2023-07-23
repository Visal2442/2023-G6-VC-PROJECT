<template>
     <div>
          <v-container fluid class="mr-md-9">
               <div :id="isFound ? '' : 'container'">
                    <div class=" w-75 ma-auto">
                         <SearchLocation @onSearch="onSearch" @onInput="onInput"></SearchLocation>
                         <v-row>
                              <v-col>
                                   <div class=" my-5 font-weight-black">Filter By Type</div>
                                   <FilterType @onSelect="onSelect"></FilterType>
                              </v-col>
                              <v-col cols="7">
                                   <div class=" text-center my-5 font-weight-black">Filter By Price</div>
                                   <FilterByPrice @onPrice="onPrice"></FilterByPrice>
                              </v-col>
                         </v-row>
                    </div>

                    <v-container fluid class="ml-md-9">
                         <v-row class="mr-md-10" v-if="isFound">
                              <v-col md="3" v-for="(property, i) of properties" :key="i">
                                   <house-card :property="property" @addToWishlist="addToWishlist" @rateStar="rateStar"></house-card>
                              </v-col>
                         </v-row>
                         <v-row v-else class="h-50">
                              <v-col class="text-center text-h4">
                                   <div>{{ notFoundMessage }}</div>
                              </v-col>
                         </v-row>
                    </v-container>
                    <v-pagination v-if="isFound" v-model="pagination.current" :length="pagination.total" :total-visible="7"
                         @click="onPageChange()"></v-pagination>
               </div>
          </v-container>
     </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import Cookies from 'js-cookie';

import SearchLocation from '@/components/search/SearchLocation.vue';
import FilterType from '@/components/search/FilterType.vue';
import FilterByPrice from '@/components/search/FilterPrice.vue';
import HouseCard from '@/components/card/HouseCard.vue';

// Wishlist Store 
import { useWishlistStore } from '../store/WishlistStore';
const wishlistStore = useWishlistStore();
const { addWishlist, userWishlist } = wishlistStore;
const cookieEmail = ref(Cookies.get('email'));

// Add to wishlist 
const addToWishlist = (property_id) => {
     if (cookieEmail.value) {
          const isNotAdded = ref(true);
          for (const property of userWishlist) {
               if (property_id == property.property.id) {
                    alert('This house is exist in your Wishlist !');
                    isNotAdded.value = false;
                    break;
               }
          }
          if (isNotAdded.value) {
               addWishlist(property_id);
               alert('The House is added to your Wishlist !');
          }
     }
     else {
          alert('Please Login to your account !');
     }
}

// PAGINATION 
const properties = ref({});
const pagination = ref({
     current: 1,
     total: 0,
})

const district_id = ref('');
const type = ref('');
const price = ref('');
const isFound = ref(true);
const notFoundMessage = ref('');

const getProperties = () => {
     let url = ref('/properties/pagination?page=' + pagination.value.current);
     if (district_id.value !== '') {
          url.value = url.value + '&district_id=' + district_id.value;
     }
     else if (type.value != '') {
          url.value = url.value + '&type=' + type.value;
     }
     else if (price.value != '') {
          url.value = url.value + '&min=' + price.value.min + '&max=' + price.value.max;
     }
     axios.get(url.value)
          .then(res => {
               properties.value = res.data.data.data;
               pagination.value.total = res.data.data.last_page;
               isFound.value = true;
          })
          .catch(err => {
               notFoundMessage.value = err.response.data.message;
               isFound.value = false;
          })
}
const onPageChange = () => {
     window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
     });
     getProperties();
}
computed(() => {
     if (district_id.value != '') {
          getProperties();
     }
     return true;
})
onMounted(() => {
     getProperties();
});

// Search district 
const onSearch = (id) => {
     district_id.value = id;
     getProperties();
}
const onInput = (value) => {
     if (value == '') {
          district_id.value = '';
          getProperties();
     }
}

// Select type house or room 
const onSelect = (value) => {
     type.value = value;
     getProperties();
}

// Filter house by price 
const onPrice = (value) => {
     price.value = value;
     getProperties();
}

// Rating Star
const rateStar = (property)=>{
     getProperties();
     console.log(property);
     axios.post('/properties/ratings', property)
     .then(res=>{
          console.log(res);
     })
     .catch(err=>err);
}

</script>

<style scoped>
#container {
     height: 100vh;
}

.slide-fade-enter-active {
     transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
     transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
     transform: translateX(20px);
     opacity: 0;
}
</style>