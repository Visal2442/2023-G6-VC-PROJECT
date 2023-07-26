<template>
    <v-row class="d-flex align-center">
        <v-col class=" d-flex align-center" cols="5">
            <div>From: </div>
            <v-text-field type="number" min="0" v-model="price.min" class="ml-1" density="compact" variant="solo" single-line hide-details></v-text-field>
        </v-col>
        <v-col class=" d-flex align-center" cols="5">
            <div>To: </div>
            <v-text-field type="number" min="0" v-model="price.max" class="ml-1" density="compact" variant="solo" single-line hide-details></v-text-field>
        </v-col>
        <v-col cols="2">
            <BaseButton type="primary-btn" :disabled="!isNumber" @click="onPrice">Filter</BaseButton>
        </v-col>
    </v-row>
</template>

<script setup>
import { ref, watch, defineEmits } from 'vue';
import BaseButton from '../widget/BaseButton.vue'

const emit = defineEmits(['onPrice'])
const price = ref({
    min:0,
    max:0
})
const isNumber = ref(false)
watch(price.value,(newValue)=>{
    price.value.min = newValue.min;
    price.value.max = newValue.max
    if(newValue.min > 0 && newValue.max > 0){
        isNumber.value = true;
    }
    else{
        isNumber.value = false;
    }
})
const onPrice=()=>{
    emit('onPrice', price.value);
}




</script>

<style></style>