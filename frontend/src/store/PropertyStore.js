import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const usePropertyStore = defineStore("property", () => {
    const properties = ref([]);
    const propertiesPerpage = ref([]);
    const userProperties = ref([]);
    const userId = ref(localStorage.getItem('user_id'));

    // Get all properties
    const getAllProperties = () => {
        axios.get("/properties")
            .then((res) => {
                properties.value = res.data.data;
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // Get 12 properties per page
    const getPropertiesPerPage = () => {
        axios.get("/properties/pagination")
            .then((res) => {
                propertiesPerpage.value = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // Get properties by user id 
    const getPropertiesByUserId = () => {
        axios.get(`/getAllProperties/${userId.value}`)
            .then((res) => {
                userProperties.value = res.data.data;
            })
            .catch(err => console.log(err));
    }

    // Delete property by id
    const deletePropertyById = (propertyId) => {
        axios.delete(`/properties/delete/${propertyId}`)
            .then(() => {
                getPropertiesByUserId();
                getAllProperties();
            })
            .catch((errors) => {
                console.log(errors);
            });
    };

    // Update property by id
    const updatePropertyById = (propertyId, data) => {
        axios.put(`/updateProperty/${propertyId}`, data)
        .then(() => {
            getPropertiesByUserId();
            getAllProperties();
        })
        .catch((errors) => {
          console.log(errors);
        });
    };

    getAllProperties();
    getPropertiesPerPage();

    return {
        properties,
        propertiesPerpage,
        userProperties,
        getAllProperties,
        getPropertiesByUserId,
        deletePropertyById,
        updatePropertyById,
    };
});
