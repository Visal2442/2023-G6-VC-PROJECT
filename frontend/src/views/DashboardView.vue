<template>
    <div>
        <v-container fluid class="">
            <!-- Summary  -->
            <v-row no-gutters>
                <v-col id="summary" rounded="lg"
                    class=" bg-light-blue-lighten-5 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../assets/dashboard/group.png')" width="50"></v-img>
                    <div class="text-light-blue-darken-1 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Users</p>
                        <p>{{ userCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" rounded="lg"
                    class=" bg-purple-lighten-5 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../assets/dashboard/profile.png')" width="50"></v-img>
                    <div class="text-purple-darken-1 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Customers</p>
                        <p>{{ customerCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" rounded="lg"
                    class=" bg-green-accent-1 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../assets/dashboard/landlord.png')" width="50"></v-img>
                    <div class="text-green-accent-4 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Landlords</p>
                        <p>{{ landlordCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" class="bg-orange-lighten-4 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../assets/dashboard/home.png')" width="50"></v-img>
                    <div class="text-orange-darken-1 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Properties</p>
                        <p>{{ propertyCount }}</p>
                    </div>
                </v-col>
            </v-row>
            <!-- Lanlord table  -->
            <v-row class="pa-1">
                <v-col>
                    <v-sheet elevation="5" class=" pa-5 w-100" rounded="lg">
                        <table class=" w-100">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>UserInfo</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-avatar>
                                                <v-img :src="require('../assets/profile2.jpeg')" width="60"></v-img>
                                            </v-avatar>
                                            <div class=" ml-2">
                                                <p class="font-weight-bold">Visal</p>
                                                <v-card-subtitle class="pa-0">visal@gmail.com</v-card-subtitle>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0929292</td>
                                    <td>
                                        <div class="d-flex">
                                            <v-card-subtitle class="pa-0 bg-green-lighten-4 text-green-accent-4 px-2 py-1 rounded-xl font-weight-bold">Landlord</v-card-subtitle>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-icon class="mdi mdi-pencil-outline mr-3" size="small" color="blue-accent-4">
                                                <v-tooltip activator="parent" location="top">Edit</v-tooltip>
                                            </v-icon>
                                            <v-icon class="mdi mdi-trash-can-outline" size="small" color="red">
                                                <v-tooltip activator="parent" location="top">Delete</v-tooltip>
                                            </v-icon>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';

const property = ref([]);
const customers = ref([]);
const landlord = ref([]);
const users = ref([]);
// property count
axios.get(`/properties`).then((res) => {
  property.value = res.data.data;
});

const propertyCount = computed(() => {
  return property.value.length;
});

// user count
axios.get(`/user`).then((res) => {
    users.value = res.data.data;
});

const userCount = computed(() => {
  return users;
});

// customer count
axios.get(`/customers`).then((res) => {
    customers.value = res.data;
});

const customerCount = computed(() => {
  return customers;
});

// landlord count

axios.get(`/landlord`).then((res) => {
    landlord.value = res.data;
});

const landlordCount = computed(() => {
  return landlord;
});


</script>

<style scoped>
#summary {
    margin: 5px;
    border-radius: 10px;
}

table,
th,
td {
    /* border: none; */
    border-collapse: collapse;
}

thead th {
    border-bottom: 1px solid #b8b2b2;
    padding: 10px;
    text-align: start;
}

tbody td {
    border-bottom: 1px solid #b8b2b2;
    padding: 10px;
}


</style>