<template>
  <div>
    <l-map :zoom="zoom" :center="center" class="w-100" style="height: 580px">
        <l-tile-layer :url="url" :attribution="attribution" ></l-tile-layer>
      <l-marker :lat-lng="markerLatLng[0]">
          
      </l-marker>
    </l-map>
  </div>
</template>

<script setup>
import "leaflet/dist/leaflet.css";
import{ LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";

// Map Configuration 
const zoom = 7;
const center = [12.768561493419046, 104.67705945739371];
const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attribution = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';

const markerLatLng = [
  {lat:13.093556403084756, lon:103.1961993958954},
  {lat:13.093556403084756, lon:100.1961993958954},
  {lat:11.5583, lon:104.9121},
  {lat:11.5583, lon: 104.9121},
];
</script>

<style>

</style>