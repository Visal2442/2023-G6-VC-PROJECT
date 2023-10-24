<template>
     <div :class="[isFound ? '' : 'no-result']">
          <!-- Warning and Success Alert  -->
          <TheTransition>
               <v-alert id="transition" v-model="isAlert" :class="alertBackground" width="30%" :icon="alertIcon"
                    :text="alertMessage" closable>
                    <v-progress-linear v-model="progress" bg-color="green" absolute bottom></v-progress-linear>
               </v-alert>
          </TheTransition>
          <v-container fluid class="mr-md-9">
               <div>
                    <div class=" w-75 ma-auto">
                         <h1>{{ emoji }}</h1>
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
                                   <v-skeleton-loader type="card" :loading="loading">
                                        <house-card :property="property" @rateStar="rateStar" @alert="alert"></house-card>
                                   </v-skeleton-loader>
                              </v-col>
                         </v-row>
                         <v-row v-else>
                              <v-col class="text-center d-flex flex-column justify-center align-center">
                                   <h1 align="center" class="text-black">{{ notFoundMessage }}</h1>
                                   <v-img :src="require('../../assets/not_found/no_result.gif')" width="500"></v-img>
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
import TheTransition from '../../components/widget/TheTransition.vue';
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
let loading = ref(true);
const emoji = ref('');

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
          console.log(response[0].data)
          emoji.value = response[0].data.emoji
          properties.value = response[0].data.data.data;
          pagination.value.total = response[0].data.data.last_page;
          isFound.value = true;
     }
     catch (err) {
          notFoundMessage.value = err.response.data.message;
          isFound.value = false;
     }
}
const onPageChange = async () => {
     loading.value = true;
     window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
     });
     await getProperties();
     loading.value = false
}
computed(() => {
     if (district_id.value != '') {
          getProperties();
     }
     return true;
})

// Search district 
const onSearch = async(id) => {
     district_id.value = id;
     await getProperties();
}
const onInput = async(value) => {
     if (value == '') {
          district_id.value = '';
          await getProperties();
     }
}

// Select type house or room 
const onSelect = async(value) => {
     loading.value = true
     type.value = value;
     await getProperties();
     loading.value = false
}

// Filter house by price 
const onPrice = (value) => {
     price.value = value;
     getProperties();
}

// Rating Star
const rateStar = async(property) => {
     await axios.post('/properties/ratings', property).then(() => { }).catch(err => err);
}

// Warning and Success Alert 
const isAlert = ref(false);
const progress = ref(0);
const alertMessage = ref('');
const alertBackground = ref('');
const alertIcon = ref('$success');
const alert = (val) => {
     if (val) {
          if (val.type == 'warning') {
               alertBackground.value = 'bg-orange-darken-2';
               alertMessage.value = val.message;
               alertIcon.value = '$warning';
          }
          else {
               alertMessage.value = val.message;
               alertBackground.value = 'bg-green-accent-3';
          }
          isAlert.value = true;
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

onMounted(async() => {
     await getProperties();
     loading.value = false;
});
</script>

<style scoped>
#container {
     height: 100vh;
}

.v-progress-linear {
     transition: 2s;
}

#transition {
     position: sticky;
     top: 0;
     z-index: 100000;
}

.no-result {
     background: white;
}
</style>