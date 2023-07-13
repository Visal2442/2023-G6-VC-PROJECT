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
    <v-toolbar class="pa-3" :style="{background:backgroundNavbar}" v-model="cookieEmail">
      <v-toolbar-items class="d-flex align-center">

        <img :src="require('../../assets/logo.png')" alt="" width="200">
        <!-- <v-img src="../../assets//dream-house-logo.png" width="400" height="400"></v-img> -->
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items class=" d-flex align-center">
        <div class="text-black">
          <template v-for="item in navItems" :key="item.name">
            <router-link :to="{ name: item.name }" class="text-button text-decoration-none text-black mr-7">{{item.title}}</router-link>
          </template>
        </div>

        <div class="ml-5" v-if="!isLoggedIn">
          <router-link :to="{ name: 'Register' }"
            class="text-button text-decoration-none text-black mr-2">Register</router-link>
          <router-link :to="{ name: 'Login' }"
            class="text-button text-decoration-none text-black mr-3">Login</router-link>
        </div>
        <div v-else class="pf">
          <v-btn class="mr-3" @click="logout">Logout</v-btn>
          <img :src="require('../../assets/pf.jpg')" width="40" height="40" class="mr-3">
        </div>

      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import Cookies from 'js-cookie';

// Pinia Store 
import { useAuthStore } from '../../store/AuthStore';
import { storeToRefs } from 'pinia';
const authStore = useAuthStore();
const { logout } = authStore;
const { token} = storeToRefs(authStore);

const navItems = ref([
  { title:'Home', name:'Home'},
  { title:'Property', name:'property'},
  { title:'About', name:'About'},
  { title:'Map', name:'Map'},
  // { title:'Detail', name:'Detail'},
])

const cookieEmail = ref('');
const isLoggedIn = ref(false);
watch(token,(newValue)=>{
  if(newValue!=null){
    isLoggedIn.value = true;
  }
  else{
    isLoggedIn.value = false;
  }
})
const signIn=()=>{
  cookieEmail.value=Cookies.get('email')
}
signIn();

let scrollY = ref(0);
const background = ref('white');
const onScroll =(e)=>{
  scrollY.value = e.currentTarget.scrollY;
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