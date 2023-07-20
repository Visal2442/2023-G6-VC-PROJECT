<template>
    <v-container fluid>
        <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
            <v-form fast-fail x="d-flex flex-column" v-model="isValide">
                <div class=" d-flex">
                    <v-text-field type="text" clearable color="green-accent-4" label="House Name" class="mr-5"
                        placeholder="House Name" variant="outlined" v-model="nameHouse" :rules="rules.nameHouse"></v-text-field>
                    <v-text-field type="text" clearable color="green-accent-4" label="Size" name="size" placeholder="Size"
                        variant="outlined" v-model="size" :rules="rules.size"></v-text-field>
                </div>
                <div class=" d-flex">
                    <v-text-field type="number" clearable color="green-accent-4" label="Price Per Month" class="mr-5"
                        placeholder="Price Per Month" variant="outlined" v-model="price" :rules="rules.price"></v-text-field>
                    <v-text-field type="file" clearable color="green-accent-4" label="Image" name="image"
                        placeholder="Image" variant="outlined" ref="image" @change="getImage" :rules="rules.propertyImage"></v-text-field>
                </div>
                <div class="d-flex">
                    <v-text-field type="number" clearable color="green-accent-4" label="Floor" class="mr-5" name="floor"
                        placeholder="Floor" variant="outlined" v-model="numberFloor" :rules="rules.numberFloor"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Room" class="mr-5"
                        name="room" placeholder="Number Of Room" variant="outlined" v-model="numberRoom" :rules="rules.numberRoom"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Kitchen" class="mr-5"
                        name="kitchen" placeholder="Number Of Kitchen" variant="outlined"
                        v-model="numberKitchen" :rules="rules.numberKitchen"></v-text-field>
                    <v-text-field type="number" clearable color="green-accent-4" label="Number Of Bathroom" name="bathroom"
                        placeholder="Number Of Bathroom" variant="outlined" v-model="numberBathroom" :rules="rules.numberBathroom"></v-text-field>
                </div>
                <div class="d-flex">
                    <v-select v-model="selected" placeholder="districts" label="Select District" :items="districts"
                        density="compact" color="green-accent-4" variant="outlined" :rules="rules.district"></v-select>
                </div>
                <div class="d-flex">
                    <v-textarea clearable label="Description" placeholder="Discription" color="green-accent-4"
                        variant="outlined" v-model="description" :rules="rules.description"></v-textarea>
                </div>
                <div class="d-flex justify-end">
                    <v-btn type="button" class=" mb-5 bg-green-accent-4 text-white px-15" @click="addProperty" :disabled="!isValide">Add</v-btn>
                </div>
            </v-form>
        </v-sheet>
    </v-container>
</template>
<script setup>

import axios from 'axios';
import { onMounted, ref, defineProps } from 'vue';
const props = defineProps(['type']);
const selected = ref('');
const districts = ref([]);
let isValide= ref(false);
onMounted(() => {
    axios.get('/districts').then(res => {
        districts.value = res.data.data;

    })
})
const userId = parseInt(localStorage.getItem('user_id'));
const nameHouse = ref(null);
const size = ref(null);
const price = ref(null);
const image = ref(null);
const numberFloor = ref(null);
const numberRoom = ref(null);
const numberKitchen = ref(null);
const numberBathroom = ref(null);
const description = ref(null);
const latitude = ref(11.601063990);
const longitude = ref(104.911125447);
const propertyImage = ref("");


const getImage = (event) => {
    const file = event.target.files[0]
    const form = new FormData();
    form.append('propertyImage', file);
    axios.post('/image', form).then((response) => {
        propertyImage.value = response.data;
    });
}
const addProperty = () => {
    const property = {
        name: nameHouse.value,
        price: price.value,
        description: description.value,
        type: props.type,
        size: size.value,
        number_of_floor: numberFloor.value,
        number_of_room: numberRoom.value,
        number_of_bathroom: numberBathroom.value,
        number_of_kitchen: numberKitchen.value,
        image: propertyImage.value,
        latitude: latitude.value,
        longitude: longitude.value,
        district_id: selected.value,
        user_id: userId
    }

    axios.post('/createProperty', property)
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        }
    );
    refreshProperty();

}
const refreshProperty=()=>{
    nameHouse.value='',
    price.value='',
    description.value='',
    size.value='',
    numberFloor.value='',
    numberRoom.value='',
    numberBathroom.value='',
    numberKitchen.value='',
    propertyImage.value=null,
    selected.value=''
};

// Validation rules 
const rules = ref({
    nameHouse:[ value => !!value || 'Housename is required'],
    size: [   value => !!value || 'size is required',],
    price: [   value => !!value || 'Price is required ',
              ],
    numberFloor:[ value => !!value || 'number of floor is required'],
    numberRoom:[  value => !!value || 'number of room  is required'],
    numberKitchen:[  value => !!value || 'number of kitchen  is required'],
    numberBathroom:[  value => !!value || 'number of bathroom  is required'],
    description:[  value => !!value || ' description is required'],
    propertyImage:[  value => !!value || ' Image property is required'],
    district:[  value => !!value || ' districts of property is required'],
})
</script>

<style></style>