<template>
  <div id="navbar" class="">
    <!-- Large Screen -->
    <v-toolbar class="pa-4 px-12" :elevation="elevationNavbar" :style="{ background: backgroundNavbar }">
      <v-toolbar-items class="d-flex align-center">
        <img :src="require('../../assets/logo.png')" alt="" width="200">
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items class=" d-flex align-center">
        <div class="text-black">
          <template v-for="item in navItems" :key="item.name">
            <router-link :to="{ name: item.name }" class="text-button text-decoration-none text-black mr-7">{{ item.title
            }}</router-link>
          </template>
          <router-link :to="{ name: 'Wishlist' }" class="text-button text-decoration-none text-black mr-7">Wishlist</router-link>
          
        </div>
        <!-- After Logged in -->
        <v-avatar id="logout" :image="profileCookie" size="50" v-if="cookieEmail && profileCookie"></v-avatar>

        <!-- Before Login  -->
        <v-icon icon="mdi-dots-vertical" id="logged-in" v-else></v-icon>
        <v-menu id="menu" activator="#logged-in">
          <v-list>
            <v-list-item>
              <v-btn variant="plain" :to="{ name: 'Register' }" prepend-icon="mdi mdi-login">Register</v-btn>
            </v-list-item>
            <v-list-item>
              <v-btn variant="plain" :to="{ name: 'Login' }" prepend-icon="mdi mdi-account">Login</v-btn>
            </v-list-item>
          </v-list>
        </v-menu>
        <!-- After Logged in -->
        <v-menu activator="#logout">
          <v-list>
            <v-list-item>
              <div>
              <h5>User Profile</h5>

              </div>
              <div class="profile d-flex flex-row mt-5 mb-5">
                <div class="file-input">
                    <v-avatar id="logout"  :image="profileCookie" size="50"></v-avatar>
                    <input type="file" v-on:change="getImage" >
                </div>

                <div class="email-username ml-5">
                  <h3> {{ username }} </h3>
                  <h3> {{ role }} </h3>
                  <p>{{ email }} </p>
                </div>
              </div>
              <v-btn variant="plain" @click="isLoggedOut = !isLoggedOut" prepend-icon="mdi mdi-logout">Logout</v-btn>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>
    </v-toolbar>

    <v-dialog v-model="isLoggedOut" width="25%">
      <v-card class="m-5 w-100 bg-white pa-5" elevation="4">
        <div class="mb-5 mt-5 d-flex align-center">
          <v-icon class="mdi mdi-alert text-red mr-2"></v-icon>
          <p>Do you want to log out your account?</p>
        </div>
        <v-card-actions class="button">
          <v-btn class="cancel text-button text-blue mr-1" @click="isLoggedOut = !isLoggedOut">Cancel</v-btn>
          <v-btn class="deleteBtn bg-red text-button px-10" @click="logout">
            Log Out
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Cookies from 'js-cookie';
import axios from 'axios';
const isLoggedOut = ref(false);
// Pinia Store 
import { useAuthStore } from '../../store/AuthStore';
import { storeToRefs } from 'pinia';
const authStore = useAuthStore();
const { logout } = authStore;
const { role } = storeToRefs(authStore);

const navItems = ref([
  { title: 'Home', name: 'Home' },
  { title: 'Property', name: 'property' },
  { title: 'Map', name: 'Map' },
  { title: 'Contact Us', name: 'Contact' },
  // { title: 'About', name: 'About' },
])
const cookieEmail = ref(Cookies.get('email'));
const profileCookie = ref(Cookies.get('image'));
const email = ref(Cookies.get('email'));
const username = ref(Cookies.get('username'));

const scrollY = ref(0);
const elevation = ref(4);
const profile = ref('');

const background = ref('white');
const onScroll = (e) => {
  scrollY.value = e.currentTarget.scrollY;
}
window.addEventListener('scroll', onScroll);

const backgroundNavbar = computed(() => {
  if (scrollY.value >= 60) {
    return background.value;
  }
  return 'none';
})
const elevationNavbar = computed(() => {
  if (scrollY.value >= 60) {
    return elevation.value;
  }
  return 0;
})


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
      profileCookie.value= Cookies.get('image')
}

</script>

<style scoped>
#login-btn {
  background: none;
}

.v-toolbar {
  background: none;
}

#navbar {
  position: sticky;
  top: 0;
  z-index: 2000;
}

.router-link-active {
  border-bottom: 4px solid rgb(47, 255, 54);
}

#login-btn {
  background: none;
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