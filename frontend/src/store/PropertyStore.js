import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const usePropertyStore = defineStore("property", () => {
  const properties = ref([]);
//   const districts = ref([]);
//   const name = ref("");
  let currentLat = ref(0);
  let currentLng = ref(0);

  // Get all properties
  axios
    .get("/properties")
    .then((res) => {
      properties.value = res.data.data;
      //   console.log(properties.value);
    })
    .catch((err) => {
      console.log(err);
    });
  // Get all districts
//   axios
//     .get(`/locations/${name.value}`)
//     .then((res) => {
//       districts.value = res.data.data;
//     })
//     .catch((err) => {
//       console.log(err);
//     });

  // Callback function
  const showLocation = (location) => {
    currentLat.value = location.coords.latitude;
    currentLng.value = location.coords.longitude;
  };
  const showError = (error) => {
    console.log(error);
  };
  // Get current location
  navigator.geolocation.getCurrentPosition(showLocation, showError);

  return {
    properties,
    showLocation,
    currentLat,
    currentLng,
    showError,
    // districts,
    // name,
  };
});
