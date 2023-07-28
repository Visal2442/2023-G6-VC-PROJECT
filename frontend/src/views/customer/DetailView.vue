<template>
  <div>
    <TheTransition id="transition">
      <v-alert v-model="isAlert" width="30%" icon="$warning" text="Please Login to Your Account !"
        class="bg-orange-accent-3" closable></v-alert>
    </TheTransition>
  <v-container fluid class="pa-11">
    <v-row>
      <v-col cols="7">
        <v-img id="imgDetail" :src="property?.image"></v-img>
      </v-col>
      <v-col cols="5">
        <v-card class="pa-5">
          <v-card-title class="text-green-accent-4 text-h3 font-weight-bold mb-5">{{ property?.name }}</v-card-title>
          <div class="d-flex justify-between">
            <v-card-text class="">Type</v-card-text>
            <v-card-text class="text-end text-capitalize">{{ property?.type }} Rent</v-card-text>
          </div>
          <div class="d-flex justify-between">
            <v-card-text class="">Room</v-card-text>
            <v-card-text class="text-end">{{
              property?.number_of_room
            }}</v-card-text>
          </div>
          <div class="d-flex justify-between">
            <v-card-text class="">Floor</v-card-text>
            <v-card-text class="text-end">{{
              property?.number_of_floor
            }}</v-card-text>
          </div>
          <div class="d-flex justify-between">
            <v-card-text class="">Bathroom</v-card-text>
            <v-card-text class="text-end">{{
              property?.number_of_bathroom
            }}</v-card-text>
          </div>
          <div class="d-flex justify-between">
            <v-card-text class="">Kitchen</v-card-text>
            <v-card-text class="text-end">{{
              property?.number_of_kitchen
            }}</v-card-text>
          </div>
          <div class="d-flex justify-between">
            <v-card-text class="">Price</v-card-text>
            <v-card-text class="text-end">${{ property?.price }}/Month</v-card-text>
          </div>
          <div class="d-flex justify-center">
            <base-button v-if="property?.type == 'room'" type="primary-btn" class="w-100 mt-5 mb-3"
              disabled>Book</base-button>
            <base-button v-else type="primary-btn" class="w-100 mt-5 mb-3" :disabled='!property?.available'
              @click="book()">Book</base-button>
          </div>
        </v-card>
      </v-col>
    </v-row>

    <v-row class="d-flex align-start my-10">
      <v-col>
        <!-- RESOURCE : Vuetify 3  -->
        <v-card>
          <v-tabs fixed-tabs v-model="tab" class="bg-green-accent-4">
            <v-tab value="Description">Description</v-tab>
            <v-tab value="type" v-if="property?.type == 'room'">View Rooms</v-tab>
            <v-tab value="overview">Property Overview</v-tab>
          </v-tabs>
          <v-card-text>
            <v-window v-model="tab">
              <v-window-item value="Description">
                {{ property?.description }}
              </v-window-item>
              <v-window-item value="type">
                <v-card class="my-5 pa-5" elevation="7" v-for="room of rooms" :key="room.id">
                  <v-row class="">
                    <v-col class="d-flex justify-space-between" cols="12">
                      <h3 class="">Room {{ room.id }}</h3>
                      <div>
                        <p class="title text-caption rounded-pill pl-2 pr-2 ml-4" :class="room?.available
                          ? 'text-blue bg-blue-lighten-4'
                          : 'text-red bg-red-lighten-4'
                          ">
                          {{ room?.available ? "Available" : "Unavailable" }}
                        </p>
                      </div>
                      <v-spacer></v-spacer>
                      <div>
                        <h3 class="font-weight-bold">
                          ${{ property?.price }}/Month
                        </h3>
                      </div>
                    </v-col>
                    <v-col class="d-flex justify-space-between" cols="12">
                      <div class="d-flex">
                        <div class="d-flex align-center mr-3">
                          <v-icon class="mdi mdi-shower mr-3" size="x-large"></v-icon>
                          <span>{{ property?.number_of_bathroom }}</span>
                        </div>
                        <div class="d-flex align-center mr-3">
                          <v-icon class="mdi mdi-countertop-outline mr-3" size="x-large"></v-icon>
                          <span>{{ property?.number_of_kitchen }}</span>
                        </div>
                        <div class="d-flex align-center">
                          <v-icon class="mdi mdi-texture-box mr-3" size="x-large"></v-icon>
                          <span>{{ property?.size }}</span>
                        </div>
                      </div>
                      <div>
                        <base-button type="primary-btn" @click="booking(room.id)" :disabled="!room?.available">Book
                          Now</base-button>
                      </div>
                    </v-col>
                  </v-row>
                </v-card>
              </v-window-item>
              <v-window-item value="overview" class="d-flex text-center">
                <div class="propertyOverview mt-2 ma-5 pa-2 d-flex">
                  <v-icon class="mdi mdi-id-card text-center"></v-icon>
                  <h4>Room Id:</h4>
                  <h3>{{ property?.id }}</h3>
                </div>
                <div class="propertyOverview mt-2 ma-5 pa-2  d-flex">
                  <v-icon class="mdi mdi-home-search-outline"></v-icon>
                  <h4>Name:</h4>
                  <h3>{{ property?.name }}</h3>
                </div>
                <div class="propertyOverview mt-2 ma-5 pa-2  d-flex">
                  <v-icon class="mdi mdi-home-analytics">T:</v-icon>
                  <h4>Type:</h4>
                  <h3>{{ property?.type }}</h3>
                </div>
              </v-window-item>
            </v-window>
          </v-card-text>
        </v-card>
      </v-col>

      <v-col class="ma-auto">
        <l-map :zoom="zoom" v-if="property" :center="[property?.latitude, property?.longitude]" class=""
          style="height: 450px">
          <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
          <l-marker :lat-lng="[property?.latitude, property?.longitude]" @click="getLatlng">
            <LPopup>
              <HouseCardOnMap :property="property" :distance="distance">
              </HouseCardOnMap>
            </LPopup>
            <LIcon :icon-size="dynamicSize" :icon-url="homeIcon" :icon-anchor="dynamicAnchor"></LIcon>
          </l-marker>
        </l-map>
      </v-col>
    </v-row>
  </v-container>
</div>
</template>

<script setup>
import BaseButton from '@/components/widget/BaseButton.vue';
import TheTransition from '@/components/widget/TheTransition.vue';
import { computed, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();
import HouseCardOnMap from '../../components/card/HouseCardOnMap.vue';
const tab = ref(null);
const isAlert = ref(false);

// RESOURCE: https://vue2-leaflet.netlify.app/components/LPopup.html#demo
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "@vue-leaflet/vue-leaflet";
import HomeIcon from '../../assets/marker/homeIcon.png'
import axios from 'axios';
import Cookies from 'js-cookie';
// Map Configuration 
const zoom = 12;
const url = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
const attribution =
  '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
// Marker Icon
const iconSize = 50;
const homeIcon = HomeIcon;
const dynamicSize = computed(() => {
  return [iconSize, iconSize * 1.15];
});
const dynamicAnchor = computed(() => {
  return [iconSize / 2, iconSize * 1.15];
});

const currentLat = ref(localStorage.getItem('currentLat'));
const currentLng = ref(localStorage.getItem('currentLng'));
let markerLat = ref(0);
let markerLng = ref(0);

const getLatlng = (coordinate) => {
  markerLat.value = coordinate.latlng.lat;
  markerLng.value = coordinate.latlng.lng;
};


const distance = computed(() => {
  return calculateDistance(currentLat.value, markerLat.value, currentLng.value, markerLng.value).toFixed(2);
});

// RESOURCE : https://www.geeksforgeeks.org/program-distance-two-points-earth/
function calculateDistance(lat1, lat2, lon1, lon2) {
  // Convert degrees to radians.
  lon1 = (lon1 * Math.PI) / 180;
  lon2 = (lon2 * Math.PI) / 180;
  lat1 = (lat1 * Math.PI) / 180;
  lat2 = (lat2 * Math.PI) / 180;

  // Haversine formula
  let dlon = lon2 - lon1;
  let dlat = lat2 - lat1;
  let a =
    Math.pow(Math.sin(dlat / 2), 2) +
    Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(dlon / 2), 2);
  let c = 2 * Math.asin(Math.sqrt(a));

  // Radius of earth in kilometers. Use 3956
  // for miles
  let r = 6371;

  // calculate the result
  return c * r;
}

// Fetch data from database
const property = ref(null);
const rooms = ref([]);
axios.get(`/properties/detail/${route.params.id}`).then((res) => {
  if (res.data.data.length > 1) {
    rooms.value = res.data.data[1];
    property.value = res.data.data[0];
  } else {
    property.value = res.data.data;
  }
});

// Booking 
const booking = (room_id) => {
  if (Cookies.get('email') !== undefined) {
    localStorage.setItem('room_id', room_id);
    router.push('/booking');
  } else {
    isAlert.value = true;
    setTimeout(()=>{
      isAlert.value = false;
    }, 2000);
  }
}
const book = () => {
  if (Cookies.get('email')) {
    router.push({ name: 'Booking' });
  } else {
    isAlert.value = true;
    setTimeout(()=>{
      isAlert.value = false;
    }, 2000);
  }
}
</script>

<style scoped>
#map {
  width: 100%;
}

#imgDetail {
  width: 100%;
  height: 530px;
}
#transition {
     position: sticky;
}
</style>
