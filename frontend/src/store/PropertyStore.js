import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const usePropertyStore = defineStore('property', () => {
    const properties = ref([]);
    const propertiesPerpage = ref([]);

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

    return {
        properties,
        propertiesPerpage,
    }
});
