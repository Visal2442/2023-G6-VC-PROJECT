<template>
    <v-card id="house-card" class=" pb-3">
        <v-img :src="require('../../assets/home/living-room-2732939_1280.jpg')"></v-img>
        <v-card-title class=" text-lg-h6">Luxury House</v-card-title>
        <div class="d-flex align-center">
            <v-card-subtitle>1 kitchen</v-card-subtitle>
            <v-card-subtitle>1 bathroom</v-card-subtitle>
            <v-card-subtitle>2 rooms</v-card-subtitle>
        </div>
        <v-card-actions class="pa-0">
            <v-card-text class=" text-green-accent-4 text-md-body-1">$400/month</v-card-text>
            <v-card-text class=" text-green-accent-4 text-md-body-1 text-end">$400/month</v-card-text>
        </v-card-actions>
        <v-card-actions>
            <div class="d-flex align-center">
                <v-avatar :image="require('../../assets/pf.jpg')" class=" ml-2"></v-avatar>
                <v-card-subtitle>Sal</v-card-subtitle>
            </div>
            <v-spacer></v-spacer>
            <BaseButton type="bg-green-accent-3">More Detail</BaseButton>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import BaseButton from '../widget/BaseButton.vue'

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