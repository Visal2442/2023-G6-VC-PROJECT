<template>
  <div class="search-location d-flex flex-column align-center">
    <v-text-field class=" w-100 position-relative" density="compact" variant="solo" label="Search District"
      append-inner-icon="mdi-magnify" single-line hide-details v-model="searchText"></v-text-field>
    <div class="w-100">
      <ul class="result position-absolute w-100" density="compact" elevation="4">
        <div v-for="district in districts" :key="district.id">
          <li class="district pa-3" v-if="!isNotFound" @click="onClick(district)">
            <v-icon icon="mdi mdi-magnify" class="mr-4"></v-icon>
            {{ district.name }}
          </li>
        </div>
        <li class="district pa-3" v-if="isNotFound">{{ districts.message }}</li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, defineEmits } from "vue";
import axios from "axios";

const emit = defineEmits(['onSearch', 'onInput']);
const searchText = ref(null);
const districts = ref([]);
const isClicked = ref(false)
const isNotFound = ref(false)

watch (searchText, async (newValue) => {
  emit('onInput', newValue);
  if (newValue != '' && !isClicked.value) {
    try{
      const response = await axios.get(`/properties/location/${newValue}`);
      isNotFound.value = false;
      districts.value = response.data.data;
    }
    catch (err){
      isNotFound.value = true;
      districts.value = err.response.data;
    }
  }
  else {
    isClicked.value = false;
    districts.value = [];
  }
});
const onClick = (district) => {
  searchText.value = district.name;
  isClicked.value = true;
  emit('onSearch', district.id);
}
</script>

<style scoped>
.search-location {
  position: relative;
}

.district {
  list-style-type: none;
}

.district:hover {
  background-color: rgb(228, 228, 228);
  cursor: pointer;
}

.result {
  background: white;
  z-index: 100;
  top: 45px;
  /* box-shadow: 10px 10px 6px lightblue; */
}
</style>
