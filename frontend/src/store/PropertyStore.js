import { defineStore } from "pinia";
import { ref } from 'vue';
import axios from 'axios';

export const usePropertyStore = defineStore('property', () => {
    const properties = ref([]);
    const propertiesPerpage = ref({});
    let currentLat = ref(0);
    let currentLng = ref(0);

    // Get all properties
    axios.get('/properties').then(res=>{
        properties.value = res.data.data;
    }).catch(err=>{
        console.log(err);
    }) 
    // Get 12 properties per page
    axios.get('/properties/pagination').then(res=>{
        propertiesPerpage.value= res.data;
    }).catch(err=>{
        console.log(err);
    })

    // Callback function 
    const showLocation = (location)=>{
        console.log(location);
        currentLat.value = location.coords.latitude;
        currentLng.value =  location.coords.longitude;
    }
    const showError = (error)=>{
        console.log(error);
    }
    // Get current location 
    navigator.geolocation.getCurrentPosition(showLocation, showError);

    return {
        properties,
        propertiesPerpage,
        showLocation,
        currentLat,
        currentLng,
        showError,
    }
});