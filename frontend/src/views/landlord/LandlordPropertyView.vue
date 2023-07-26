<template>
  <div>
    <dashboard-property-view :properties="properties"></dashboard-property-view>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import DashboardPropertyView from '../DashboardPropertyView.vue';

const user_id = ref(localStorage.getItem('user_id'));
const properties = ref([]);

onMounted(()=>{
  axios.get(`/getAllProperties/${user_id.value}`).then((res) => {
      properties.value = res.data.data;
      return properties.value;
  });
})

</script>

<style>

</style>
