<template>
  <div>

    <!-- ** -->
    <!-- Resource : https://vue2-leaflet.netlify.app/components/LPopup.html#demo -->
    <!-- ** -->
    <l-map :zoom="zoom" :center="center" class="w-75 ma-auto" style="height: 580px">
      <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>

      <div v-for="(property, index) of properties" :key="index">
        <!-- <div v-for="house of property" :key="house.property_id"> -->
          <l-marker :lat-lng="[property.latitude, property.longitude]" @click="getLatlng">
            <LPopup>
              <v-card class="mx-auto" max-width="400" elevation='0'>
                <v-img class="align-end text-white" height="200" :src="require('../assets/google.png')"
                  cover>
                  <v-card-title>Top 10 Australian beaches</v-card-title>
                </v-img>

                <v-card-subtitle class="pt-4">
                  {{ distance }} KM
                </v-card-subtitle>

                <v-card-text>
                  <div>Whitehaven Beach</div>

                  <div>Whitsunday Island, Whitsunday Islands</div>
                </v-card-text>

                <v-card-actions>
                  <v-btn color="orange">
                    Share
                  </v-btn>

                  <v-btn color="orange">
                    Explore
                  </v-btn>
                </v-card-actions>
              </v-card>
            </LPopup>
            <LIcon :icon-size="dynamicSize" :icon-url="homeIcon" :icon-anchor="dynamicAnchor"></LIcon>
          </l-marker>
        <!-- </div> -->
      </div>

    </l-map>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";

// Pinia Store
import { storeToRefs } from "pinia";
import { usePropertyStore } from '../store/PropertyStore';
const propertyStore = usePropertyStore();
const { properties, currentLat, currentLng } = storeToRefs(propertyStore);

// RESOURCE: https://vue2-leaflet.netlify.app/components/LPopup.html#demo 
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
const dynamicAnchor = computed(() => {
  return [iconSize / 2, iconSize * 1.15];
})

let markerLat = ref(0);
let markerLng = ref(0);

const getLatlng = (coordinate) => {
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

</script>

<style></style>