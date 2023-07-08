<template>
  <div>
  <the-navbar></the-navbar>

    <!-- ** -->
      <!-- Resource : https://vue2-leaflet.netlify.app/components/LPopup.html#demo -->
    <!-- ** -->
    <l-map :zoom="zoom" :center="center" class="w-75 ma-auto" style="height: 580px">
      <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>

      <div v-for="(property, index) of properties" :key="index">
        <div v-for="house of property" :key="house.property_id">
          <l-marker :lat-lng="[house.latitude, house.longitude]">
            <LPopup>
              <h1>{{ house.name }}</h1>
              <p>Price: {{ house.price }}$/month</p>
              <img src='../assets/google.png' alt="" height="150" width="150">
            </LPopup>
            <LIcon :icon-size="dynamicSize" :icon-url="homeIcon" :icon-anchor="dynamicAnchor"></LIcon>
          </l-marker>
        </div>
      </div>

    </l-map>


    <!-- <div v-for="(property, index) of properties" :key="index">
        <div v-for="house of property" :key="house.property_id">
         <img src="{{house.image}}" alt="">
        </div>
      </div> -->
  </div>
</template>

<script setup>
import { computed } from "vue";
// Pinia Store
import { storeToRefs } from "pinia";
import { usePropertyStore} from '../store/PropertyStore';
const propertyStore = usePropertyStore()
const {properties} = storeToRefs(propertyStore);

// **
    // Resource : https://vue2-leaflet.netlify.app/components/LPopup.html#demo 
// **
// Map 
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "@vue-leaflet/vue-leaflet";
import HomeIcon from '../assets/marker/homeIcon.png'
// Map Configuration 
const zoom = 8;
const center = [12.768561493419046, 104.67705945739371];
const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attribution = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';

// Marker Icon 
const iconSize = 50;
const homeIcon = HomeIcon;
const dynamicSize = computed(() => {
  return [iconSize, iconSize * 1.15];
})
const dynamicAnchor=computed(()=> {
      return [iconSize / 2, iconSize * 1.15];
    })
</script>

<style></style>