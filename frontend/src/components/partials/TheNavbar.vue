<template>
  <div id="navbar" class="" elevation="2">
    <!-- Small Screen  -->
    <!-- <v-layout>
    <v-navigation-drawer v-model="sidebar" temporary>
      <v-list>
        <v-list-item v-for="item in menuItems" :key="item.title" :to="{ name: item.name }">
          <v-list-item-title>
            {{ item.title }}
          </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    </v-layout> -->

    <!-- Large Screen  -->
    <v-toolbar class="pa-3" :style="{background:backgroundNavbar}">
      <v-toolbar-items class="d-flex align-center">
        <img :src="require('../../assets/logo.png')" alt="" width="200">
        <!-- <v-img src="../../assets//dream-house-logo.png" width="400" height="400"></v-img> -->
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items class=" d-flex align-center">
        <div class="text-black">
          <router-link :to="{ name: 'Home' }" class="text-button text-decoration-none text-black mr-7">Home</router-link>
          <router-link :to="{ name: 'property' }"
            class="text-button text-decoration-none text-black mr-7">Property</router-link>
          <router-link :to="{ name: 'About' }"
            class="text-button text-decoration-none text-black mr-7">About</router-link>
          <router-link :to="{ name: 'Map' }" class="text-button text-decoration-none text-black mr-7">Map</router-link>
        </div>
      </v-toolbar-items>
      <v-toolbar-items class="d-flex align-center ml-5 mr-10">
        <div class=" d-flex align-center" v-if="cookieEmail == undefined">
          <router-link :to="{ name: 'Register' }"
            class="text-button text-decoration-none text-black">Register</router-link>
            <h3 class="mx-2">/</h3>
          <router-link :to="{ name: 'Login' }"
            class="text-button text-decoration-none text-black mr-3">Login</router-link>
        </div>
        <div v-else class="pf">
          <v-btn class="mr-3" @click="logout">Logout</v-btn>
          <img src="../../assets/pf.jpg" width="40" height="40" class="mr-3">
        </div>
      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Cookies from 'js-cookie';
import { useAuthStore } from '../../store/AuthStore';

const authStore = useAuthStore();
const { logout } = authStore;

const cookieEmail = ref(Cookies.get('email'))
let scrollY = ref(0);
const background = ref('white');

const onScroll =(e)=>{
  scrollY.value = e.currentTarget.scrollY;
  console.log(e.currentTarget.scrollY);
}
window.addEventListener('scroll', onScroll);

const backgroundNavbar=computed(()=>{
  if(scrollY.value >= 60){
    return background.value;
  }
  return 'none';
})
</script>

<style scoped>
.v-toolbar {
  background: none;
}

#navbar {
  position: sticky;
  top: 0;
  z-index: 10;
}
.router-link-active{
  border-bottom: 4px solid rgb(47, 255, 54);
}
#login-btn{
  background: none;
}
.pf {
  display: flex;
  align-items: center;
}

.pf img {
  border-radius: 50%;
}

</style>