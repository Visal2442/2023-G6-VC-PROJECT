<template>
  <div class="search">
    <div class="searchLocation">
      <input
        class="research"
        type="text"
        placeholder="search here"
        v-model="searchQuery"
      />
      <v-icon size="large" color="white" icon="mdi mdi-magnify"></v-icon>
      <div v-if="searchResults.length" class="districtCard">
        <span
          class="district"
          v-for="result in searchResults"
          :key="result.id"
          >{{ result.name }}</span
        >
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import axios from "axios";

const URL = "http://127.0.0.1:8000/api/locations/";
const searchQuery = ref("");
const searchResults = ref([]);
watch(searchQuery, async (value) => {
  try {
    const response = await axios.get(`${URL} + ?name=${value}`);
    searchResults.value = response.data.data;
  } catch (error) {
    console.error(error);
  }
});
</script>

<style scoped>
.search {
  text-align: center;
  margin-top: -40%;
  margin-bottom: 40%;
}
.research {
  width: 40.5%;
  padding: 9px;
  margin-left: -15px;
  background: rgba(255, 255, 255, 0.772);
}
.research input {
  outline: none;
  background: white;
  width: 80%;
  padding: 10px;
  border-radius: 2px 0 0 2px;
}
.districtCard {
  width: 43.9%;
  margin-left: 27.4%;
  margin-top: -5px;
  text-align: center;
  background: white;
  box-shadow: 0px 0px 6px 0px rgba(128, 128, 128, 0.874);
}
.v-icon {
  background: orange;
  padding: 21.5px;
  border-radius: 0 5px 0px 0;
  margin-bottom: 3px;
}
.district {
  display: flex;
  justify-content: center;
  height: auto;
}
.district:hover {
  background-color: rgb(228, 228, 228);
}
</style>
