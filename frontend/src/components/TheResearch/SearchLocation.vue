<template>
  <!-- <div class="search"> -->
    <div class="searchLocation d-flex flex-column align-center">
      <v-text-field class=" w-50"
        density="compact"
        variant="solo"
        label="Search District"
        append-inner-icon="mdi-magnify"
        single-line
        hide-details
        v-model="searchText"
      ></v-text-field>

      <div class="">
        <span
          class="district"
          v-for="district in districts"
          :key="district.id"
          @click="onClick(district)"
          >{{ district.name }}</span
        >
        <span class="district" v-if="isNotFound">{{ districts.message }}</span>
      </div>
    </div>
  <!-- </div> -->
</template>

<script setup>
import { ref, watch, defineEmits } from "vue";
import axios from "axios";

const emit = defineEmits(['onSearch', 'onInput']);
const searchText = ref(null);
const districts = ref([]);
const isClicked = ref(false)
const isNotFound = ref(false)

watch(searchText, (newValue) => {
  emit('onInput', newValue);
  if(newValue!='' && !isClicked.value){
    axios.get(`/properties/location/${newValue}`)
    .then(res=>{
      isNotFound.value = false;
      districts.value= res.data.data;
    }).catch(err=>{
      isNotFound.value = true;
      districts.value = err.response.data;
    });
  }
  else{
    isClicked.value = false;
    districts.value = [];
  }
});
const onClick = (district)=>{
  searchText.value= district.name;
  isClicked.value = true;
    emit('onSearch', district.id);
}
</script>

<style scoped>
.search {
  text-align: center;
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
}
.district:hover {
  background-color: rgb(228, 228, 228);
}
</style>
