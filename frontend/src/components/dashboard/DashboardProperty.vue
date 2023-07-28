<template>
    <div>
        <v-container fluid class="my-5">
            <h1 v-if="role == 'landlord'" class="my-5">Your Properties</h1>
            <h1 v-else class="my-5">All Properties</h1>
            <v-container class="" elevation="6">
                <v-row>
                    <table class="w-100">
                        <thead class="bg-green-accent-4">
                            <tr class="">
                                <th class="text-start">Image</th>
                                <th class="text-start">Price</th>
                                <th class="text-start">Size</th>
                                <th class="text-start">Floor</th>
                                <th class="text-start">Room</th>
                                <th class="text-start">Bathroom</th>
                                <th class="text-start">Kitchen</th>
                                <th class="text-start">Status</th>
                                <th class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="" v-for="property of props.properties" :key="property.id">
                                <td><v-img :src="property.image" width="100"></v-img></td>
                                <td>${{ property.price }}/Month</td>
                                <td>{{ property.size }}</td>
                                <td>{{ property.number_of_floor }}</td>
                                <td>{{ property.number_of_room }}</td>
                                <td>{{ property.number_of_bathroom }}</td>
                                <td>{{ property.number_of_kitchen }}</td>
                                <td>
                                    <div class="d-flex">
                                        <v-card-subtitle v-if="property.available"
                                            class="pa-0 bg-light-blue-lighten-4 text-light-blue-darken-1 px-2 py-1 rounded-lg font-weight-bold">Available</v-card-subtitle>
                                        <v-card-subtitle v-else
                                            class="pa-0 bg-red-lighten-4 text-red-darken-1 px-2 py-1 rounded-lg font-weight-bold">Unavailable</v-card-subtitle>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-center">
                                        <v-icon class="mdi mdi-pencil-outline mr-1" size="small" color="blue-accent-4"
                                            @click="editProperty(property.id)">
                                            <v-tooltip activator="parent" location="top">Edit</v-tooltip>
                                        </v-icon>
                                        <v-icon class="mdi mdi-trash-can-outline" size="small" color="red"
                                            @click="dialogDeleteProperty(property.id)">
                                            <v-tooltip activator="parent" location="top">Delete</v-tooltip>
                                        </v-icon>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </v-row>
            </v-container>
        </v-container>

        <!-- Edit dialog  -->
        <v-dialog v-model="dialog">
            <v-card>
                <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
                    <v-card-title align="center" class="text-green text-h4 mb-5 font-weight-bold">EDIT
                        PROPERTY</v-card-title>
                    <v-form fast-fail x="d-flex flex-column">
                        <div class="d-flex">
                            <v-text-field type="text" clearable color="green-accent-4" label="House Name" class="mr-5"
                                placeholder="House Name" variant="outlined" v-model="houseName"></v-text-field>
                            <v-text-field type="text" clearable color="green-accent-4" label="Size" name="size"
                                placeholder="Size" variant="outlined" v-model="size"></v-text-field>
                        </div>
                        <div class="d-flex">
                            <v-text-field type="number" clearable color="green-accent-4" label="Price Per Month"
                                class="mr-5" placeholder="Price Per Month" variant="outlined"
                                v-model="pricePerMonth"></v-text-field>
                            <v-file-input label="Choose an image" id="image-file-input" name="image" variant="outlined"
                                clearable color="green-accent-4" accept="image/*" placeholder="Image"
                                v-on:change="getImage"></v-file-input>
                        </div>
                        <div class="d-flex">
                            <v-text-field type="number" clearable color="green-accent-4" label="Floor" class="mr-5"
                                name="floor" placeholder="Floor" variant="outlined" v-model="floor"></v-text-field>
                            <v-text-field type="number" clearable color="green-accent-4" label="Number Of Room" class="mr-5"
                                name="room" placeholder="Number Of Room" variant="outlined"
                                v-model="numberOfRooms"></v-text-field>
                            <v-text-field type="number" clearable color="green-accent-4" label="Number Of Kitchen"
                                class="mr-5" name="kitchen" placeholder="Number Of Kitchen" variant="outlined"
                                v-model="numberOfKitchens"></v-text-field>
                            <v-text-field type="number" clearable color="green-accent-4" label="Number Of Bathroom"
                                name="bathroom" placeholder="Number Of Bathroom" variant="outlined"
                                v-model="numberOfBathrooms"></v-text-field>
                        </div>
                        <div class="d-flex">
                            <v-select v-model="selected" placeholder="Number Of Kitchen" label="Select District"
                                :items="districts" density="compact" color="green-accent-4" variant="outlined"></v-select>
                        </div>
                        <div class="d-flex">
                            <v-textarea clearable label="Description" placeholder="Discription" color="green-accent-4"
                                variant="outlined" v-model="description"></v-textarea>
                        </div>
                        <v-card-actions class="button">
                            <v-btn class="cancel text-red" color="black" text @click="dialog = !dialog">Cancel</v-btn>
                            <v-btn class="save bg-green-accent-3 text-white" color="black" text
                                @click="saveChanges()">Update</v-btn>
                        </v-card-actions>
                    </v-form>
                </v-sheet>
            </v-card>
        </v-dialog>

        <!-- Delete dialog  -->
        <v-dialog v-model="deleteDialog" width="25%">
            <v-card>
                <v-sheet class="m-5 w-100 bg-white pa-5" elevation="4">
                    <div class="cencelIcon">
                        <v-icon class="mdi mdi-alert text-red"></v-icon>
                    </div>
                    <v-form fast-fail x="d-flex flex-column">
                        <p align="center" class="mb-5 mt-5">
                            Do you want to delete this property?
                        </p>
                        <v-card-actions class="button">
                            <v-btn class="cancel text-button text-blue mr-1"
                                @click="deleteDialog = !deleteDialog">Cancel</v-btn>
                            <v-btn class="deleteBtn bg-red text-overline text-white" color="black"
                                @click="deleteProperty()">
                                Delete
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-sheet>
            </v-card>
        </v-dialog>
    </div>
</template>
    
<script setup>
import axios from "axios";
import { ref, onMounted, defineProps, defineEmits } from "vue";
import Cookies from 'js-cookie';

const role = ref(Cookies.get('role'));
const dialog = ref(false);
const deleteDialog = ref(false);
const houseName = ref("");
const size = ref("");
const pricePerMonth = ref(0);
const image = ref('');
const floor = ref(0);
const numberOfRooms = ref(0);
const numberOfKitchens = ref(0);
const numberOfBathrooms = ref(0);
const selected = ref("");
const description = ref("");
const propertyImage = ref("");
const districts = ref([]);

const props = defineProps(["properties"]);
const emits = defineEmits(['modify']);

// Property Store 
import { usePropertyStore } from '../../store/PropertyStore';
const { deletePropertyById, updatePropertyById } = usePropertyStore();

const getImage = (event) => {
    const file = event.target.files[0];
    const form = new FormData();
    form.append("propertyImage", file);
    axios.post("/image", form).then((response) => {
        propertyImage.value = response.data;
    });
};

// Edit property 
const editProperty = (propertyId) => {
    localStorage.setItem("property_id", propertyId);
    axios.get(`/properties/detail/${propertyId}`).then((response) => {
        const property = response.data.data;
        if (property.type == "house") {
            houseName.value = property.name;
            size.value = property.size;
            pricePerMonth.value = property.price;
            image.value = property.image;
            floor.value = property.number_of_floor;
            numberOfBathrooms.value = property.number_of_bathroom;
            numberOfKitchens.value = property.number_of_kitchen;
            numberOfRooms.value = property.number_of_room;
            description.value = property.description;
            selected.value = property.district.value;
        } else {
            houseName.value = property[0]["name"];
            size.value = property[0]["size"];
            pricePerMonth.value = property[0]["price"];
            image.value = property[0]["image"];
            console.log(image.value);
            floor.value = property[0]["number_of_floor"];
            numberOfBathrooms.value = property[0]["number_of_bathroom"];
            numberOfKitchens.value = property[0]["number_of_kitchen"];
            numberOfRooms.value = property[0]["number_of_room"];
            description.value = property[0]["description"];
            selected.value = property[0]["district"]["value"];
        }
    });
    localStorage.setItem("property_id", propertyId);
    dialog.value = true;
};
const saveChanges = () => {
    let propertyId = localStorage.getItem("property_id");
    const data = ref({
        name: houseName.value,
        size: size.value,
        price: pricePerMonth.value,
        image: propertyImage.value,
        number_of_floor: floor.value,
        number_of_room: numberOfRooms.value,
        number_of_kitchen: numberOfKitchens.value,
        number_of_bathroom: numberOfBathrooms.value,
        description: description.value,
        district_id: selected.value,
    });
    updatePropertyById(propertyId, data.value);
    emits('modify');
    dialog.value = false;
};

// Delete Property 
const dialogDeleteProperty = (propertyId) => {
    localStorage.setItem('property_id', propertyId)
    deleteDialog.value = true;
};
const deleteProperty = () => {
    let propertyId = localStorage.getItem("property_id");
    deletePropertyById(propertyId);
    emits('modify');
    deleteDialog.value = false;
};

onMounted(() => {
    axios.get("/districts").then((res) => {
        districts.value = res.data.data;
    });
});
</script>
    
<style scoped>
table,
th,
td {
    border: none;
    border-collapse: collapse;
}

thead th {
    padding: 10px;
}

tbody td {
    border-bottom: 1px solid #e7e7e7;
    padding: 10px;
}

.button {
    display: flex;
    justify-content: end;
    margin-top: -1%;
}

.cancel:hover {
    background: rgb(239, 239, 239);
}

.save:hover {
    background: gray;
}

.cencelIcon {
    display: flex;
    justify-content: center;
    font-size: 30px;
}

.deleteDialog {
    height: 50%;
}

.v-img {
    border-radius: 5px;
}</style>
    