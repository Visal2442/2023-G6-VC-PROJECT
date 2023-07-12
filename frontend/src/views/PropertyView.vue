<template>
     <div :id="isFound? '' : 'container'">
          <!-- <div class="banner"> -->
               <!-- <div class="banner-img"> -->
               <!-- <img src="../assets/banner-property.jpg" alt="" width="1280" height="640"> -->
               <!-- </div> -->
          <!-- </div> -->
          <SearchLocation @onSearch="onSearch" @onInput="onInput"></SearchLocation>
          <SelectTypePrice @onSelect="onSelect"></SelectTypePrice>

          <v-container fluid class="ml-md-9">
               <v-row class="mr-md-10" v-if="isFound">
                    <div v-for="(property,i) of properties" :key="i" >
                         <v-col md="3">
                              <house-card :property="property"></house-card>
                         </v-col>
                    </div>
               </v-row>
               <v-row v-else class="h-50">
                    <v-col class="text-center text-h4">
                         <div>{{notFoundMessage}}</div>
                    </v-col>
               </v-row>
          </v-container>
          <v-pagination v-if="isFound" v-model="pagination.current" :length="pagination.total" @click="onPageChange()"></v-pagination>
     </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

import SearchLocation from '@/components/TheResearch/SearchLocation.vue';
import SelectTypePrice from '@/components/TheResearch/SelectTypePrice.vue'
import HouseCard from '@/components/card/HouseCard.vue';

// PAGINATION 
const properties = ref({});
const pagination = ref({
     current: 1,
     total: 0,
})

const district_id=ref('');
const type = ref('');
const isFound = ref(true);
const notFoundMessage = ref('');

const getProperties = () => {
     let url = ref('/properties/pagination?page=' + pagination.value.current);
     if(district_id.value !== ''){
          url.value = url.value + '&district_id='+district_id.value;
     }
     else if(type.value != ''){
          url.value = url.value + '&type='+type.value;
     }
     axios.get(url.value)
          .then(res => {
               properties.value = res.data.data.data;
               pagination.value.total = res.data.data.last_page;
               isFound.value = true;
          })
          .catch(err=>{
               notFoundMessage.value = err.response.data.message;
               isFound.value = false;
          })
}
const onPageChange = () => {
     getProperties();
}
computed(()=>{
     if(district_id.value !=''){
          getProperties();
     }
     return true;
})
onMounted(() => {
     getProperties();
});

// Search district 
const onSearch=(id)=>{
     district_id.value = id;
     getProperties();
}
const onInput=(value)=>{
     if(value == ''){
          district_id.value = '';
          getProperties();
     }
}

// Select type house or room 
const onSelect=(value)=>{
     type.value = value;
     getProperties();
}

</script>

<style scoped>
#container{
     height: 100vh;
}
</style>