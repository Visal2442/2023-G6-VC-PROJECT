<template>
  <div>
    <v-container fluid>
      <v-row class="pa-1">
        <v-col>
          <v-sheet elevation="5" class=" pa-5 w-100" rounded="lg">
            <div id="search" class=" d-flex flex-column">
              <h2 class="pa-0 mb-8">Users</h2>
              <v-text-field type="search" v-model="searchText" @input="searchUser(searchText)" label="Search" variant="outlined" density="compact" color="green-accent-4"></v-text-field>
            </div>
            <table class="w-100">
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
                        <v-img :src="user.image" width="60"></v-img>
                      </v-avatar>
                      <div class=" ml-2">
                        <p class="font-weight-bold">{{ user.username }}</p>
                        <v-card-subtitle class="pa-0">{{ user.email }}</v-card-subtitle>
                      </div>
                    </div>
                  </td>
                  <td>{{ user.phone_number }}</td>
                  <td>
                    <div class="d-flex">
                      <v-card-subtitle class="pa-0 px-2 py-1 rounded-lg font-weight-bold text-capitalize"
                        :class="[user.role === 'admin' ? adminBackground : '', user.role === 'landlord' ? landloardBackground : '', user.role === 'customer' ? customerBackground : '']">{{ user.role }}</v-card-subtitle>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-center">
                      <v-icon class="mdi mdi-pencil-outline mr-3" size="small" color="blue-accent-4"
                        @click="getData(user.id)">
                        <v-tooltip activator="parent" location="top">Edit</v-tooltip>
                      </v-icon>
                      <v-icon class="mdi mdi-trash-can-outline" size="small" color="red"
                        @click="deleteUserAccountByAddmin(user.id, user.role)">
                        <v-tooltip activator="parent" location="top">Delete</v-tooltip>
                      </v-icon>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
              <div class=" d-flex flex-column align-center justify-center">
                <template v-if="users.length<=0">
                  <v-img :src="require('../../assets/not_found/no_user.svg')"></v-img>
                  <h2>No User Found</h2>
                </template>
              </div>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
    <!-- Edit user form  -->
    <v-dialog v-model="dialog" width="35%" class="">
      <v-card rounded="lg">
        <v-card-title class="pa-0 pa-3 bg-green-accent-4 text-white">Edit User</v-card-title>
        <div class=" w-100 bg-white pa-5">
          <v-form fast-fail x="d-flex flex-column">
            <v-text-field type="text" clearable color="green-accent-4" label="Username" v-model="userName"
              placeholder="Enter Your Username" class="pa-0" density="compact" variant="outlined"
              rounded="lg"></v-text-field>
            <v-text-field type="email" clearable color="green-accent-4" label="Email" name="email" v-model="email"
              placeholder="Enter Your Email" density="compact" variant="outlined" rounded="lg"></v-text-field>
            <v-select v-if="selected !== 'admin'" v-model="selected" :items="items" density="compact" variant="outlined" label="Role"
              placeholder="Role"></v-select>
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
import { onMounted, ref } from "vue";
import BaseButton from "@/components/widget/BaseButton.vue";
import axios from "axios";


const users = ref([]);
const selected = ref('');
const dialog = ref(false);
const userName = ref('');
const email = ref('');
const searchText= ref('');

const items = ref([
  { title: 'Landlord', value: 'landlord' },
  { title: 'Customer', value: 'customer' },
])
const adminBackground = ref('bg-light-blue-lighten-5 text-light-blue-darken-1');
const landloardBackground = ref('bg-green-lighten-5 text-green-accent-4');
const customerBackground = ref('bg-purple-lighten-5 text-purple-darken-1');

const deleteUser = ref(false);
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

const editUser = () => {
  const id = localStorage.getItem('userId');
  if (userName.value !== '' && email.value !== '' && selected.value !== '') {
    const userData = {
      'username': userName.value,
      'email': email.value,
      'role': selected.value
    }
    axios.put(`/updateUser/${id}`, userData).then(res => {
      console.log(res.data);
      dialog.value = false;
      displayUsers();
    });
  }
}

const displayUsers = async () => {
  let url = ref('/users');
  if(searchText.value != ''){
    url.value = url.value + '?name=' + searchText.value;
  }
  await axios.get(url.value).then((response) => {
    users.value = response.data.data;
    console.log(users.value);
  });
};

const searchUser=(text)=>{
  searchText.value = text;
  displayUsers();
}

const deleteUserAccountByAddmin = (userId, role) => {
  localStorage.setItem('userId', userId);
  localStorage.setItem('userRole', role);
  if (localStorage.getItem('userRole') !== 'admin') {
    deleteUser.value = true;
  } else {
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
  deleteUser.value = false;
};

onMounted(() => {
  displayUsers();
});
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
}
#search .v-text-field{
  width: 30%;
}
</style>
