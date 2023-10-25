<template>
  <v-container fluid>
    <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
      <v-form fast-fail x="d-flex flex-column" v-model="isValid">
        <div class="d-flex">
          <v-text-field
            type="text"
            clearable
            color="green-accent-4"
            label="House Name"
            class="mr-5"
            placeholder="House Name"
            variant="outlined"
            v-model="nameHouse"
            :rules="rule.nameHouse"
          ></v-text-field>
          <v-text-field
            type="text"
            clearable
            color="green-accent-4"
            label="Size"
            name="size"
            placeholder="Size"
            variant="outlined"
            v-model="size"
            :rules="rule.size"
          ></v-text-field>
        </div>
        <div class="d-flex">
          <v-text-field
            type="number"
            clearable
            color="green-accent-4"
            label="Price Per Month"
            class="mr-5"
            placeholder="Price Per Month"
            variant="outlined"
            v-model="price"
            :rules="rule.price"
          ></v-text-field>
          <v-text-field
            type="file"
            clearable
            color="green-accent-4"
            label="Image"
            name="image"
            placeholder="Image"
            variant="outlined"
            ref="image"
            @change="getImage"
            :rules="rule.propertyImage"
          ></v-text-field>
        </div>
        <div class="d-flex">
          <v-text-field
            type="number"
            clearable
            color="green-accent-4"
            label="Floor"
            class="mr-5"
            name="floor"
            placeholder="Floor"
            variant="outlined"
            v-model="numberFloor"
            :rules="rule.numberFloor"
          ></v-text-field>
          <v-text-field
            v-if="type !== 'room'"
            type="number"
            clearable
            color="green-accent-4"
            label="Number Of Room"
            class="mr-5"
            name="room"
            placeholder="Number Of Room"
            variant="outlined"
            v-model="numberRoom"
            :rules="rule.numberRoom"
          ></v-text-field>
          <v-text-field
            type="number"
            clearable
            color="green-accent-4"
            label="Number Of Kitchen"
            class="mr-5"
            name="kitchen"
            placeholder="Number Of Kitchen"
            variant="outlined"
            v-model="numberKitchen"
            :rules="rule.numberKitchen"
          ></v-text-field>
          <v-text-field
            type="number"
            clearable
            color="green-accent-4"
            label="Number Of Bathroom"
            name="bathroom"
            placeholder="Number Of Bathroom"
            variant="outlined"
            v-model="numberBathroom"
            :rules="rule.numberBathroom"
          ></v-text-field>
        </div>
        <div class="d-flex">
          <v-text-field
            v-if="type == 'room'"
            type="number"
            clearable
            color="green-accent-4"
            label="Number Of Room"
            class="mr-5"
            name="room"
            placeholder="Number Of Room You Want To Rent"
            variant="outlined"
            v-model="numberRoom"
            :rules="rule.numberRoom"
          ></v-text-field>
        </div>
        <div class="d-flex">
          <v-select
            v-model="selected"
            placeholder="districts"
            label="Select District"
            :items="districts"
            density="compact"
            color="green-accent-4"
            variant="outlined"
            :rules="rule.district"
          ></v-select>
        </div>
        <div class="d-flex">
          <v-textarea
            clearable
            label="Description"
            placeholder="Discription"
            color="green-accent-4"
            variant="outlined"
            v-model="description"
            :rules="rule.description"
          ></v-textarea>
        </div>
        <div class="d-flex flex-column mb-10">
          <!-- ** -->
          <!-- Resource : https://vue2-leaflet.netlify.app/components/LPopup.html#demo -->
          <!-- ** -->
          <p class="text-h6 mb-2">Location On Map</p>
          <l-map
            :zoom="zoom"
            :center="center"
            class="ma-auto"
            @click="getCoordiante"
            id="map"
            style="height: 300px; width: 100%"
          >
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="[markerLat, markerLng]">
              <LIcon
                :icon-size="dynamicSize"
                :icon-url="homeIcon"
                :icon-anchor="dynamicAnchor"
              ></LIcon>
            </l-marker>
          </l-map>
        </div>
        <div class="d-flex justify-end">
          <v-btn
            type="button"
            class="mb-5 bg-green-accent-4 text-white px-15"
            @click="addProperty"
            :disabled="!isValid"
            >Add</v-btn
          >
        </div>
      </v-form>
    </v-sheet>
  </v-container>
</template>
<script>
import axios from "axios";
// RESOURCE: https://vue2-leaflet.netlify.app/components/LPopup.html#demo
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LIcon } from "@vue-leaflet/vue-leaflet";
import HomeIcon from "../../assets/marker/homeIcon.png";
export default {
  props: ["type"],
  data() {
    return {
      selected: "",
      districts: [],
      isValid: false,
      // Map Configuration
      zoom: 12,
      center: [11.556576059366401, 104.92850555373343],
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href:"http://osm.org/copyright">OpenStreetMap</a> contributors',
      // Marker Icon
      iconSize: 50,
      homeIcon: HomeIcon,
      markerLat: this.center[0],
      markerLng: this.center[1],
      userId: parseInt(localStorage.getItem("user_id")),
      nameHouse: null,
      size: null,
      price: null,
      image: null,
      numberFloor: null,
      numberRoom: null,
      numberKitchen: null,
      numberBathroom: null,
      description: null,
      propertyImage: "",
    };
  },
  methods: {
    getCoordiante(event) {
      this.markerLat = event.latlng.lat;
      this.markerLng = event.latlng.lng;
    },
    getImage(event) {
      const file = event.target.files[0];
      const form = new FormData();
      form.append("propertyImage", file);
      axios.post("/image", form).then((response) => {
        this.propertyImage = response.data;
      });
    },
    addProperty() {
      const property = {
        name: this.nameHouse,
        price: this.price,
        description: this.description,
        type: this.type,
        size: this.size,
        number_of_floor: this.numberFloor,
        number_of_room: this.numberRoom,
        number_of_bathroom: this.numberBathroom,
        number_of_kitchen: this.numberKitchen,
        image: this.propertyImage,
        latitude: this.markerLat,
        longitude: this.markerLng,
        district_id: this.selected,
        user_id: this.userId,
      };
      axios
        .post("/createProperty", property)
        .then((response) => {
          console.log(response);
          this.$router.push({ name: "LandlordProperties" });
        })
        .catch((error) => {
          console.log(error);
        });
      this.resetInput();
    },
    resetInput() {
      this.nameHouse = "";
      this.price = "";
      this.description = "";
      this.size = "";
      this.numberFloor = "";
      this.numberRoom = "";
      this.numberBathroom = "";
      this.numberKitchen = "";
      this.propertyImage = null;
      this.selected = "";
    },
    async fetchDistricts() {
      axios.get("/districts").then((res) => {
        this.districts = res.data.data;
      });
    },
  },
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LIcon,
  },
  computed: {
    dynamicSize() {
      return [this.iconSize, this.iconSize * 1.15];
    },
    dynamicAnchor() {
      return [this.iconSize / 2, this.iconSize * 1.15];
    },
  },
  mounted() {
    this.fetchDistricts();
  },
};
</script>

<style></style>
