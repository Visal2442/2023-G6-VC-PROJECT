<template>
  <v-container fluid class="pa-11">
    <v-row>
        <v-col cols="7">
            <v-img id="imgDetail" :src="property.image"></v-img>
        </v-col>
        <v-col cols="5">
            <v-card class=" pa-5">
                <v-card-title class=" text-green-accent-4 text-h3 font-weight-bold mb-5">Luxury House</v-card-title>
                <div class="d-flex justify-between">
                    <v-card-text class="">Type</v-card-text>
                    <v-card-text class="text-end text-capitalize">{{property.type}} Rent</v-card-text>
                </div>
                <div class=" d-flex justify-between">
                    <v-card-text class="">Room</v-card-text>
                    <v-card-text class="text-end">{{ property.number_of_room }}</v-card-text>
                </div>
                <div class=" d-flex justify-between">
                    <v-card-text class="">Floor</v-card-text>
                    <v-card-text class="text-end">{{ property.number_of_floor }}</v-card-text>
                </div>
                <div class=" d-flex justify-between">
                    <v-card-text class="">Bathroom</v-card-text>
                    <v-card-text class="text-end">{{ property.number_of_bathroom }}</v-card-text>
                </div>
                <div class=" d-flex justify-between">
                    <v-card-text class="">Kitchen</v-card-text>
                    <v-card-text class="text-end">{{ property.number_of_kitchen }}</v-card-text>
                </div>
                <div class=" d-flex justify-between">
                    <v-card-text class="">Price</v-card-text>
                    <v-card-text class="text-end">${{property.price}}/Month</v-card-text>
                </div>
                <div class=" d-flex justify-center">
                    <base-button type="bg-green-accent-3" class="w-100 mt-5 mb-3">Book</base-button>
                </div>
            </v-card>
        </v-col>
    </v-row>
    <!-- Map  -->
    <v-row id="map" class="ma-auto my-10">
        <h1 class=" mb-5">Map</h1>
        <l-map :zoom="zoom" :center="center" class="" style="height: 450px">
      <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
          <l-marker :lat-lng="center" @click="getLatlng">
            <LPopup>
              <v-card class="mx-auto" elevation='0'>
                <v-img class="align-end text-white" :src="property.image">
                  <v-card-title>{{property?.property_name}}</v-card-title>
                </v-img>

                <v-card-subtitle class="pt-4">{{ distance }} KM</v-card-subtitle>

                <v-card-text>
                  <div>
                    {{property.district?.name}}, {{property.district?.province?.name}}
                  </div>
                  <div>
                    ${{property.price}}/Month
                  </div>
                </v-card-text>
              </v-card>
            </LPopup>
            <LIcon :icon-size="dynamicSize" :icon-url="homeIcon" :icon-anchor="dynamicAnchor"></LIcon>
          </l-marker>
    </l-map>
    </v-row>
  </v-container>
</template>

<script setup>
import BaseButton from '@/components/widget/BaseButton.vue';
import { computed, ref } from 'vue';
import { useRoute } from 'vue-router';
const route = useRoute();

// Pinia Store
import { storeToRefs } from "pinia";
import { usePropertyStore } from '../store/PropertyStore';
const propertyStore = usePropertyStore();
const { currentLat, currentLng } = storeToRefs(propertyStore);

// RESOURCE: https://vue2-leaflet.netlify.app/components/LPopup.html#demo 
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "@vue-leaflet/vue-leaflet";
import HomeIcon from '../assets/marker/homeIcon.png'
import axios from 'axios';
// Map Configuration 
const zoom = 9;
const center = ref([12.768561493419046, 104.67705945739371]);
const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attribution = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
// Marker Icon 
const iconSize = 50;
const homeIcon = HomeIcon;
const dynamicSize = computed(() => {
  return [iconSize, iconSize * 1.15];
})
const dynamicAnchor = computed(() => {
  return [iconSize / 2, iconSize * 1.15];
})

let markerLat = ref(0);
let markerLng = ref(0);

const getLatlng = (coordinate) => {
  console.log(coordinate.latlng.lat);
  markerLat.value = coordinate.latlng.lat
  markerLng.value = coordinate.latlng.lng
}

const distance = computed(() => {
  return calculateDistance(currentLat.value, markerLat.value, currentLng.value, markerLng.value).toFixed(2);
})

// RESOURCE : https://www.geeksforgeeks.org/program-distance-two-points-earth/
function calculateDistance(lat1, lat2, lon1, lon2) {
  // Convert degrees to radians.
  lon1 = lon1 * Math.PI / 180;
  lon2 = lon2 * Math.PI / 180;
  lat1 = lat1 * Math.PI / 180;
  lat2 = lat2 * Math.PI / 180;

  // Haversine formula
  let dlon = lon2 - lon1;
  let dlat = lat2 - lat1;
  let a = Math.pow(Math.sin(dlat / 2), 2)
    + Math.cos(lat1) * Math.cos(lat2)
    * Math.pow(Math.sin(dlon / 2), 2);
  let c = 2 * Math.asin(Math.sqrt(a));

  // Radius of earth in kilometers. Use 3956
  // for miles
  let r = 6371;

  // calculate the result
  return (c * r);
}

// Fetch data from database 
  const property = ref([]);
  axios.get(`/properties/detail/${route.params.id}`)
  .then(res=>{
    if(res.data.data.length>1){
      property.value = res.data.data[0];
    }else{
      property.value = res.data.data;
    }
    center.value.splice(0, 1, property.value.latitude);
    center.value.splice(1,1 , property.value.longitude);
    console.log(center.value);
  })

</script>

<style scoped>
div .v-card-text:first-child{
    font-size: medium;

}
div .v-card-text:last-child{
    font-size: large;
    font-weight: bold;
}
#imgDetail{
    border-radius: 15px;
}
.v-card{
    border-radius: 10px;
}
#map{
    width: 100%;
}
</style>