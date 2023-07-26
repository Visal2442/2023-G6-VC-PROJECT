<template>
    <v-toolbar id="navbar" class="bg-white py-5" elevation="3">
        <v-toolbar-title>
            <div class="d-flex align-center">
                <h4 class="">DASHBOARD</h4>
            </div>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class=" d-flex align-center pr-10">
            <div class="mr-4">
                <v-toolbar-title class="font-weight-bold text-end">{{ username }}</v-toolbar-title>
                <v-card-subtitle class="text-body-1 pa-0">{{ email }}</v-card-subtitle>
            </div>
            <v-avatar id="logged-in">
                <v-img :src="profileUser"></v-img>
            </v-avatar>
            <v-menu id="menu" activator="#logged-in">
                <v-list>
                    <v-list-item>
                        <h2>Your Profile</h2>
                        <div class="profile d-flex flex-row mt-5 mb-5">
                            <div class="file-input">
                                <v-avatar id="logout"  :image="profileUser" size="50"></v-avatar>
                                <input type="file" v-on:change="getImage" >
                            </div>

                            <div class="email-username ml-5">
                            <h3> {{ username }} </h3>
                            <p>{{ email }} </p>
                            </div>
                        </div>
                        <v-btn variant="plain" @click="logout" prepend-icon="mdi mdi-logout">Logout</v-btn>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script setup>
import { ref } from 'vue';
// Pinia Store 
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();
const { logout } = authStore;
import Cookies from 'js-cookie';
import axios from 'axios';



const username = ref(Cookies.get('username'));
const email = ref(Cookies.get('email'));
const profileUser = ref(Cookies.get('image'));
const profile = ref('');

const getImage=(event)=> {
  var file = event.target.files[0];
  console.log(file);
      var form = new FormData();
      form.append('profile', file);
      axios.post('/imageProfile', form).then((response) => {
        profile.value = response.data;
        update();
      });
}
const update = () => {
  let id = localStorage.getItem('user_id');
      const picture = {
        id: id,
        image: profile.value
      }
      axios.post(`/editProfile`,picture).then(response =>{
        console.log(response);
      });
      Cookies.set('image', profile.value);
      profileUser.value= Cookies.get('image')
}

</script>

<style scoped>
#navbar {
    position: sticky;
    top: 0;
    z-index: 2000;
}

.file-input {
  position: relative;
  display: inline-block;
}

.file-input img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
  cursor: pointer;
}
.file-input input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}
</style>