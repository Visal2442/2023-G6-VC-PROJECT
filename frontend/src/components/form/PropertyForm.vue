<template>
    <v-container fluid>
        <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
            <v-form fast-fail x="d-flex flex-column">
                <div class=" d-flex">
                    <v-text-field type="text" clearable color="green-accent-4" label="House Name" class="mr-5"
                        placeholder="House Name" variant="outlined" v-model="houseName"></v-text-field>
                    <v-text-field type="text" clearable color="green-accent-4" label="Size" name="size" placeholder="Size"
                        variant="outlined" v-model="size"></v-text-field>
                </div>
                <div class=" d-flex">
                    <v-text-field type="number" clearable color="green-accent-4" label="Price Per Month" class="mr-5"
                        placeholder="Price Per Month" variant="outlined" v-model="price"></v-text-field>
                    <input type="file" ref="image"/>
                </div>
                <div class="d-flex">
                    <v-text-field type="number" clearable color="green-accent-4" label="Floor" class="mr-5" name="floor"
                        placeholder="Floor" variant="outlined" v-model="floor"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Room" class="mr-5"
                        name="room" placeholder="Number Of Room" variant="outlined" v-model="room"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Kitchen" class="mr-5"
                        name="kitchen" placeholder="Number Of Kitchen" variant="outlined" v-model="kitchen"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Bathroom" name="bathroom"
                        placeholder="Number Of Bathroom" variant="outlined" v-model="bathroom"></v-text-field>
                </div>
                <div class="d-flex">
                    <v-select v-model="selected" placeholder="Number Of Kitchen" label="Select District" :items="districts" density="compact" color="green-accent-4" variant="outlined" ></v-select>
                </div>
                <div class="d-flex">
                    <v-textarea clearable label="Description" placeholder="Discription" color="green-accent-4"
                        variant="outlined" v-model="description"></v-textarea>
                </div>
                <div class="d-flex justify-end">
                    <v-btn type="button" class=" mb-5 bg-green-accent-4 text-white px-15">Add</v-btn>
                    {{ props.type }}
                </div>
            </v-form>
        </v-sheet>
    </v-container>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref, defineProps } from 'vue';

const props=defineProps(['type']);

const selected = ref('');
const districts = ref([]);

onMounted(()=>{
  axios.get('/districts').then(res=>{
    districts.value = res.data.data;
  })
})

</script>

<style></style>