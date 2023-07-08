<template>
  <div>
    <l-map :zoom="zoom" :center="center" class="w-100" style="height: 580px">
        <l-tile-layer :url="url" :attribution="attribution" ></l-tile-layer>
    </l-map>
  </div>
</template>

<script setup>
import "leaflet/dist/leaflet.css";
import{ LMap, LTileLayer } from "@vue-leaflet/vue-leaflet";

// Map Configuration 
const zoom = 7;
const center = [12.768561493419046, 104.67705945739371];
const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attribution = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
</script>

<style>

</style>