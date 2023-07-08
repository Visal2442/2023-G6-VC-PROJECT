<template>
     <div>
          <TheNavbar></TheNavbar>
          <div class="banner">
               <div class="banner-img">
                    <img src="../assets/banner-property.jpg" alt="" width="1280" height="640">
               </div>
          </div>
          <SearchLocation></SearchLocation>
          <SelectTypePrice></SelectTypePrice>
          <div class="card-container">
               <TheCard v-for="i in 12" :key="i"></TheCard>
          </div>
          <div class="text-center">
               <v-pagination v-model="page" :length="4" prev-icon="mdi mdi-menu-left" next-icon="mdi mdi-menu-right"></v-pagination>
          </div>
     </div>
</template>

<script>
import SearchLocation from '@/components/TheResearch/SearchLocation.vue';
import SelectTypePrice from '@/components/TheResearch/SelectTypePrice.vue'
import TheCard from '@/components/partials/TheCard.vue';
export default {
     components: {
          SearchLocation,
          SelectTypePrice,
          TheCard
     },
     data() {
          return {
               page: 1
          }
     }


}
</script>

<style></style>