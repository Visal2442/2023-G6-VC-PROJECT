<template>
  <v-container fluid class="ml-md-9">
    <!-- Banner  -->
    <v-row class="mt-7 mb-16" align="center" id="banner">
      <v-col>
        <div class="pr-3">
          <h1 id="h1-banner" class="text-green-accent-3">Your House Is Here !</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ab,magni voluptate a earum
            consequuntur, sapiente dolorem eius porro reiciendis eveniet fugiat quidem. Esse repudiandae expedita error
            hic! Perspiciatis, optio.</p>
          <div class="align-center mt-5">
            <BaseButton type="bg-green-accent-3 mr-2">Contact Us</BaseButton>
            <BaseButton type="seconday-btn">See More</BaseButton>
          </div>
        </div>
      </v-col>
      <v-col class="pa-0">
        <v-img :src="require('../assets/home/living-room-2732939_1280.jpg')" width="640" class="home-img"></v-img>
        <!-- <v-img :src="require('../assets/home/Build your home-amico.png')" width="640" id="img-banner-right"></v-img> -->
      </v-col>
    </v-row>

     <!-- Section 3 -->
     <v-row class="my-16 d-flex flex-column" align="center">
      <h1 id="h1-home">Available House</h1>
    </v-row>
    <v-row class="mr-md-10">
      <template v-for="i in 4" :key="i">
        <v-col md="3">
          <!-- <house-card></house-card> -->
        </v-col>
      </template>
    </v-row>
    
    <!-- Section 1 -->
    <v-row class="my-16 d-flex flex-column" align="center">
      <h1 id="h1-home">Know About Us!</h1>
    </v-row>

    <v-row class="mt-10" align="center">
      <v-col>
        <!-- <v-img :src="require('../assets/home/Build your home-amico.png')" width="500"></v-img> -->
        <v-img :src="require('../assets/home/mission3.jpeg')" width="640" class="home-img"></v-img>
      </v-col>
      <v-col>
        <div class="pr-4">
          <h1 class="text-green-accent-3">Your House Is Here !</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ab,magni voluptate a earum
            consequuntur, sapiente dolorem eius porro reiciendis eveniet fugiat quidem. Esse repudiandae expedita error
            hic! Perspiciatis, optio.</p>
          <div class="align-center mt-5">
            <BaseButton type="bg-green-accent-3 mr-2">Contact Us</BaseButton>
            <BaseButton type="seconday-btn">See More</BaseButton>
          </div>
        </div>
      </v-col>
    </v-row>
    <!-- Section 2 -->
    <v-row class="mt-10" align="center">
      <v-col>
        <div class="pr-4">
          <h1 class="text-green-accent-3">Your House Is Here !</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ab,magni voluptate a earum
            consequuntur, sapiente dolorem eius porro reiciendis eveniet fugiat quidem. Esse repudiandae expedita error
            hic! Perspiciatis, optio.</p>
          <div class="align-center mt-5">
            <BaseButton type="bg-green-accent-3 mr-2">Contact Us</BaseButton>
            <BaseButton type="seconday-btn">See More</BaseButton>
          </div>
        </div>
      </v-col>
      <v-col>
        <!-- <v-img :src="require('../assets/home/Build your home-amico.png')" width="500"></v-img> -->
        <v-img :src="require('../assets/home/mission3.jpeg')" width="640" class="home-img"></v-img>
      </v-col>
    </v-row>

  </v-container>
</template>

<script setup>
// import HouseCard from '../components/card/HouseCard.vue';
import BaseButton from '../components/widget/BaseButton.vue'

</script>

<style scoped>
.home-img {
  border-radius: 25px;
}

#banner-left {
  background: none;
}

#h1-banner {
  font-size: 60px;
}

#h1-home {
  margin: 20px 16px 0 0;
  border-bottom: 3px solid #00E676;
}

.seconday-btn {
  border: 1px solid #00E676;
  margin-left: 2px;
}
</style>
