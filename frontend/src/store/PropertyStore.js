import { defineStore } from "pinia";
import { ref } from 'vue';
import axios from 'axios';

export const usePropertyStore = defineStore('property', () => {
    const properties = ref([]);
    // Get all properties
    axios.get('/properties').then(res=>{
        properties.value = res.data.data;
        console.log(properties.value);
    }).catch(err=>{
        console.log(err);
    })

    // Get current location
const getLocation = () =>{
    navigator.geolocation.getCurrentPosition(showLocation, showError);
}

const showLocation = (location)=>{
  console.log(location);
}
const showError = (error)=>{
  console.log(error);
}

    return {
        properties,
        showLocation,
        getLocation,
        showError
    }
});