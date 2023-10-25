import { defineStore } from "pinia";
import axios from "axios";

export const usePropertyStore = defineStore("property", {
  state: () => ({
    properties: [],
    propertiesPerpage: [],
    userProperties: [],
    userId: localStorage.getItem("user_id"),
  }),
  actions: {
    // Get all properties
    async getAllProperties() {
      await axios
        .get("/properties")
        .then((res) => {
          this.properties = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Get 12 properties per page
    async getPropertiesPerPage() {
      await axios
        .get("/properties/pagination")
        .then((res) => {
          this.propertiesPerpage = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Get properties by user id
    async getPropertiesByUserId() {
      await axios
        .get(`/getAllProperties/${this.userId}`)
        .then((res) => {
          this.userProperties = res.data.data;
        })
        .catch((err) => console.log(err));
    },
    // Delete property by id
    async deletePropertyById(propertyId) {
      await axios
        .delete(`/properties/delete/${propertyId}`)
        .then(() => {
          this.getPropertiesByUserId();
          this.getAllProperties();
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
    // Update property by id
    async updatePropertyById(propertyId, data) {
      await axios
        .put(`/updateProperty/${propertyId}`, data)
        .then(() => {
          this.getPropertiesByUserId();
          this.getAllProperties();
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
  },
  getters: {
    propertyCount: (state) => state.properties.length,
  },
});
