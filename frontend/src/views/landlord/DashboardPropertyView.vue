<template>
  <div>
    <dashboard-property @modify="modify" :properties="role == 'admin' ? properties : userProperties"></dashboard-property>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import DashboardProperty from '../../components/dashboard/DashboardProperty.vue';
import Cookies from 'js-cookie';

// Property Store 
import { usePropertyStore } from '@/store/PropertyStore';
import { storeToRefs } from 'pinia';
const { properties, userProperties } = storeToRefs(usePropertyStore());
const { getAllProperties,getPropertiesByUserId } = usePropertyStore();

const role = ref(Cookies.get('role'));

// Use to refresh properties 
const modify = () => {
  getAllProperties();
  getPropertiesByUserId();
}

onMounted(() => {
  getAllProperties();
  getPropertiesByUserId();
})
</script>

<style></style>