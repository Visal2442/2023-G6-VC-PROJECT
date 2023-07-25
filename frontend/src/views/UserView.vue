<template>
    <div>
        <v-container fluid>
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
                                <tr v-for="user of users" :key="user">
                                    <td># {{ user.id }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-avatar>
                                                <v-img :src="require('../assets/profile2.jpeg')" width="60"></v-img>
                                            </v-avatar>
                                            <div class=" ml-2">
                                                <p class="font-weight-bold">{{ user.username }}</p>
                                                <v-card-subtitle class="pa-0">{{user.email}}</v-card-subtitle>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ user.phone_number }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <v-card-subtitle
                                                class="pa-0 bg-green-lighten-4 text-green-darken-1 px-2 py-1 rounded-xl font-weight-bold">{{user.role}}</v-card-subtitle>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-icon class="mdi mdi-pencil-outline mr-3" size="small" color="blue-accent-4"
                                                @click="isEditDialog = !isEditDialog">
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
        <!-- Edit user form  -->
        <v-dialog v-model="isEditDialog" width="35%" class="" >
            <v-card rounded="lg" >
                <v-card-title class="pa-0 pa-3 bg-green-accent-4 text-white">Edit User</v-card-title>
                <div class=" w-100 bg-white pa-5">
                    <v-form fast-fail x="d-flex flex-column">
                        <div class="input-container d-flex">
                            <v-text-field type="text" clearable color="green-accent-4" label="Username"
                                placeholder="Enter Your Username" class="pa-0" density="compact" variant="outlined"
                                rounded="lg"></v-text-field>
                            <v-text-field type="email" clearable color="green-accent-4" label="Email" name="email"
                                placeholder="Enter Your Email" density="compact" variant="outlined"
                                rounded="lg"></v-text-field>
                        </div>
                        <div class="input-container d-flex gap-5">
                            <v-text-field type="text" clearable color="green-accent-4" label="Password"
                                placeholder="Enter password" class="pa-0" density="compact" variant="outlined"
                                rounded="lg"></v-text-field>
                            <v-select v-model="selected" :items="items" density="compact" variant="outlined" label="Role" placeholder="Role"></v-select>
                        </div>
                        <v-card-actions class="button">
                            <v-btn class="cancel text-red" color="black" text @click="isEditDialog = !isEditDialog">Cancel</v-btn>
                            <BaseButton type="primary-btn">Update</BaseButton>
                        </v-card-actions>
                    </v-form>
                </div>
            </v-card>
        </v-dialog>
        <!-- Delete user dialog  -->
        <v-dialog v-model="isDeleteDialog" width="35%">
      <v-card>
        <v-sheet class="m-5 w-100 bg-white pa-5" elevation="4">
          <div class="cencelIcon">
            <v-icon class="mdi mdi-alert text-red"></v-icon>
          </div>
          <v-form fast-fail x="d-flex flex-column">
            <p align="center" class="mb-5 mt-5">
              Do you want to delete this user?
            </p>
            <v-card-actions class="button">
              <v-btn class="cancel text-button text-blue mr-1" @click="isDeleteDialog = !isDeleteDialog">Cancel</v-btn>
              <v-btn class="deleteBtn bg-red text-overline text-white" color="black">
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
import { onMounted, ref } from 'vue';
import BaseButton from '@/components/widget/BaseButton.vue';
import axios from 'axios';

const users = ref([]);

const isEditDialog = ref(false);
const isDeleteDialog = ref(false);
const selected = ref('customer');

const items = ref([
     { title: 'Landlord', value: 'landlord' },
     { title: 'Customer', value: 'customer' },
])

const displayUsers = () => {
    axios.get("/users")
        .then(response =>{
            users.value = response.data;
            console.log(users.value);
        })
}

onMounted(()=>{
    displayUsers();
})
</script>

<style scoped>
table,
th,
td {
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

.input-container {
    gap: 10px;
}</style>