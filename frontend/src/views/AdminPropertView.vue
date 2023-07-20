<template>
    <div>
        <dashboard-header></dashboard-header>
        <dashboard-property-view :properties="properties"></dashboard-property-view>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import DashboardPropertyView from './DashboardPropertyView.vue';

const properties = ref([]);

onMounted(()=>{
    axios.get('/properties').then(res=>{
        properties.value = res.data.data;
    })
    .catch(err=>{
        console.log(err);
    })
})
</script>

<style>

</style>