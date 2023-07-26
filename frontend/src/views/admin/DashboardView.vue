<template>
    <div>
        <v-container fluid>
            <!-- Summary  -->
            <v-row no-gutters>
                <v-col id="summary" rounded="lg"
                    class=" bg-light-blue-lighten-5 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../../assets/dashboard/group.png')" width="50"></v-img>
                    <div class="text-light-blue-darken-1 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Users</p>
                        <p>{{ userCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" rounded="lg"
                    class=" bg-purple-lighten-5 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../../assets/dashboard/profile.png')" width="50"></v-img>
                    <div class="text-purple-darken-1 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Customers</p>
                        <p>{{ customerCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" rounded="lg"
                    class=" bg-green-accent-1 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../../assets/dashboard/landlord.png')" width="50"></v-img>
                    <div class="text-green-accent-4 d-flex flex-column align-center">
                        <p class="font-weight-bold text-h6">Landlords</p>
                        <p>{{ landlordCount }}</p>
                    </div>
                </v-col>
                <v-col id="summary" class="bg-orange-lighten-4 d-flex flex-column justify-center align-center py-5">
                    <v-img :src="require('../../assets/dashboard/home.png')" width="50"></v-img>
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
                                    <th v-if="role == 'admin'">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(landlord,index) of landlords" :key="index">
                                    <td>#{{ landlord.id }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-avatar>
                                                <v-img :src="require('../../assets/profile2.jpeg')" width="60"></v-img>
                                            </v-avatar>
                                            <div class=" ml-2">
                                                <p class="font-weight-bold">{{ landlord.username }}</p>
                                                <v-card-subtitle class="pa-0">{{ landlord.email }}</v-card-subtitle>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ landlord.phone_number }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <v-card-subtitle class="pa-0 bg-green-lighten-4 text-green-accent-4 px-2 py-1 rounded-xl font-weight-bold">{{ landlord.role }}</v-card-subtitle>
                                        </div>
                                    </td>
                                    <td v-if="role == 'admin'">
                                        <div class="d-flex align-center">
                                            <v-icon class="mdi mdi-pencil-outline mr-3" size="small" color="blue-accent-4" @click="getData(landlord.id)">
                                                <v-tooltip activator="parent" location="top">Edit</v-tooltip>
                                            </v-icon>
                                            <v-icon class="mdi mdi-trash-can-outline" size="small" color="red" @click="deleteUserAccountByAddmin(landlord.id)">
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
           <v-dialog v-model="dialog" width="35%" class="" >
            <v-card rounded="lg" >
                <v-card-title class="pa-0 pa-3 bg-green-accent-4 text-white">Edit User</v-card-title>
                <div class=" w-100 bg-white pa-5">
                    <v-form fast-fail x="d-flex flex-column">
                            <v-text-field type="text" clearable color="green-accent-4" label="Username" v-model="userName"
                                placeholder="Enter Your Username" class="pa-0" density="compact" variant="outlined"
                                rounded="lg"></v-text-field>
                            <v-text-field type="email" clearable color="green-accent-4" label="Email" name="email" v-model="email"
                                placeholder="Enter Your Email" density="compact" variant="outlined"
                                rounded="lg"></v-text-field>
                            <v-select v-model="selected" :items="items" density="compact" variant="outlined" label="Role" placeholder="Role"></v-select>
                        <v-card-actions class="button">
                            <v-btn class="cancel text-red" color="black" text @click="cancel()">Cancel</v-btn>
                            <BaseButton type="primary-btn" @click="editUser()">Update</BaseButton>
                        </v-card-actions>
                    </v-form>
                </div>
            </v-card>
        </v-dialog>
        <!-- Delete user dialog  -->
        <v-dialog v-model="deleteUser" width="35%">
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
              <v-btn class="cancel text-button text-blue mr-1" @click="cancelDelete()">Cancel</v-btn>
              <v-btn class="deleteBtn bg-red text-overline text-white" @click="deleteUserAccount()" color="black">
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
import { ref, computed,onMounted } from 'vue';
import axios from 'axios';
import BaseButton from '@/components/widget/BaseButton.vue';
import Cookies from 'js-cookie';

const role = Cookies.get('role');
const selected = ref('');
const dialog = ref(false);
const userName = ref('');
const email = ref('');
const items = ref([
     { title: 'Landlord', value: 'landlord' },
     { title: 'Customer', value: 'customer' },
]);
const property = ref([]);
const customers = ref([]);
const landlords = ref([]);
const users = ref([]);
const deleteUser = ref(false);
// property count
axios.get(`/properties`).then((res) => {
  property.value = res.data.data;
});

const getData = (user_id) => {   
    localStorage.setItem('userId', user_id);
    axios.get(`/userId/${user_id}`)
    .then(res => {
        console.log(res.data.data);
        userName.value = res.data.data.username;
        email.value = res.data.data.email;
        selected.value = res.data.data.role;
    })
    dialog.value = true;
}

const editUser = () =>{
    const id = localStorage.getItem('userId');
    if(userName.value !=='' && email.value !=='' && selected.value !==''){
        const userData = {
        'username':userName.value,
        'email':email.value,
        'role':selected.value
        }
        axios.put(`/updateUser/${id}`, userData).then(res => {
            console.log(res.data);
            dialog.value = false;
            displayUsers();
        });
    }
    
}

const propertyCount = computed(() => {
  return property.value.length;
});

// user count
axios.get(`/users`).then((res) => {
    users.value = res.data;
});

const userCount = computed(() => {
  return users.value.length;
});

// customer count
axios.get(`/customers`).then((res) => {
    customers.value = res.data;
});

const customerCount = computed(() => {
  return customers.value.length;
});

// landlord count
const displayUsers = () => {
    axios.get(`/landlords`).then((res) => {
        landlords.value = res.data;
    });
};



const landlordCount = computed(() => {
  return landlords.value.length;
});

const deleteUserAccountByAddmin = (userId, role) => {
  localStorage.setItem('userId', userId);
  localStorage.setItem('userRole', role);
  if(localStorage.getItem('userRole') !== 'admin') {
      deleteUser.value = true;

  }else{
    alert("Can not delete admin account!");
  }
};
const cancelDelete = () => {
    deleteUser.value = false;
}
const cancel = () => {
    dialog.value = false;
}
const deleteUserAccount = () => {
  let Id = localStorage.getItem('userId');
        axios
        .delete(`/delete_user/${Id}`)
        .then(() => {
             displayUsers();
        })
        .catch((errors) => {
        console.log(errors);
        });

        console.log(localStorage.getItem("user_id"));
        deleteUser.value = false;
    
};
onMounted(() => {
  displayUsers();
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