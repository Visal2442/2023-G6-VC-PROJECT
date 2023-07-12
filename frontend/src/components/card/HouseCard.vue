<template>
    <v-card id="house-card" class=" pb-3">
        <v-img :src='property.image'></v-img>
        <v-card-title class=" text-lg-h6">{{property.name}}</v-card-title>
        <div class="d-flex align-center">
            <v-card-subtitle>{{ property.number_of_kitchen }} kitchen{{ property.number_of_kitchen > 1 ? 's':'' }}</v-card-subtitle>
            <v-card-subtitle>{{ property.number_of_bathroom }} bathroom{{ property.number_of_bathroom > 1 ? 's':'' }}</v-card-subtitle>
            <v-card-subtitle>{{ property.number_of_room }} room{{ property.number_of_room > 1 ? 's':'' }}</v-card-subtitle>
        </div>
        <v-card-actions class="pa-0">
            <v-card-text class=" text-green-accent-4 text-md-body-1">${{property.price}}/month</v-card-text>
            <v-card-text class=" text-green-accent-4 text-md-body-1 text-end">$400/month</v-card-text>
        </v-card-actions>
        <v-card-actions>
            <div class="d-flex align-center">
                <v-avatar :image="require('../../assets/pf.jpg')" class=" ml-2"></v-avatar>
                <v-card-subtitle>Sal</v-card-subtitle>
            </div>
            <v-spacer></v-spacer>
            <BaseButton type="bg-green-accent-3" @click="console.log(property.id)">More Detail</BaseButton>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { defineProps } from 'vue';
import BaseButton from '../widget/BaseButton.vue'

defineProps(['property'])



  
    
  









</script>

<style scoped>
#house-card {
    border-radius: 12px;
}

.seconday-btn {
    border: 1px solid #00E676;
    margin-left: 2px;
}
</style>