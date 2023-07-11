<template>
     <div>
          <!-- <div class="banner"> -->
               <!-- <div class="banner-img"> -->
               <!-- <img src="../assets/banner-property.jpg" alt="" width="1280" height="640"> -->
               <!-- </div> -->
          <!-- </div> -->
          <SearchLocation></SearchLocation>
          <SelectTypePrice></SelectTypePrice>
          <v-container fluid class="ml-md-9">
               <v-row class="mr-md-10">
                    <template v-for="(property,i) of properties" :key="i">
                         <v-col md="3">
                              <house-card :property="property"></house-card>
                         </v-col>
                    </template>
               </v-row>
          </v-container>
          <v-pagination v-model="pagination.current" :length="pagination.total" @click="onPageChange()"></v-pagination>
     </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
// import { useRoute } from 'vue-router';

import SearchLocation from '@/components/TheResearch/SearchLocation.vue';
import SelectTypePrice from '@/components/TheResearch/SelectTypePrice.vue'
import HouseCard from '@/components/card/HouseCard.vue';

// PAGINATION 
const properties = ref({});
const pagination = ref({
     current: 1,
     total: 0,
})
const getProperties = () => {
     axios.get('/properties/pagination?page=' + pagination.value.current)
          .then(res => {
               console.log(res.data);
               properties.value = res.data.data.data;
               pagination.value.total = res.data.data.last_page;
               console.log(res.data.data.data.length);
          })
}
const onPageChange = () => {
     getProperties();
}
onMounted(() => {
     getProperties();
})

</script>

<style scoped>

</style>