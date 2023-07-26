<template>
     <div>
          <!-- Warning Alert  -->
          <Transition name="warning" id="warning" mode="out-in">
               <v-alert v-model="isAlert" class=" bg-orange-accent-4 w-25" icon="$warning" :text="alertMessage" closable variant="outlined" >
                    <v-progress-linear v-model="progress" absolute bottom></v-progress-linear>
               </v-alert>
          </Transition>
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
                                   <house-card :property="property" @rateStar="rateStar" @alert="alert"></house-card>
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

import SearchLocation from '@/components/search/SearchLocation.vue';
import FilterType from '@/components/search/FilterType.vue';
import FilterByPrice from '@/components/search/FilterPrice.vue';
import HouseCard from '@/components/card/HouseCard.vue';

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

const getProperties = async () => {
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
     try {
          const response = await Promise.all([axios.get(url.value)]);
          properties.value = response[0].data.data.data;
          pagination.value.total = response[0].data.data.last_page;
          isFound.value = true;
     }
     catch (err) {
          notFoundMessage.value = err.response.data.message;
          isFound.value = false;
     }
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
const rateStar = (property) => {
     // getProperties();
     axios.post('/properties/ratings', property)
          .then(res => {
               console.log(pagination.value.current);
               getProperties();
               console.log(res);
          })
          .catch(err => err);
}

// Warning Alert 
const isAlert = ref(false)
const progress = ref(0);
const alertMessage = ref('');
const alert = (value) => {
     if (value) {
          isAlert.value = true;
          alertMessage.value = value;
          const inProgress = setInterval(() => {
               progress.value = progress.value + 10;
          }, 100)
          setTimeout(() => {
               isAlert.value = false;
               progress.value = 0;
               clearInterval(inProgress);
          }, 3000)
     }
     else {
          isAlert.value = false;
     }
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
.warning-enter-active{
     transition: all 0.3s ease-out;
}
.warning-leave-active {
     transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.warning-enter-from,
.warning-leave-to {
     transform: translateX(20px);
     opacity: 0;
}
.v-progress-linear {
     transition: 2s;
}

#warning {
     position: sticky;
     top: 0;
     z-index: 100000;
}</style>