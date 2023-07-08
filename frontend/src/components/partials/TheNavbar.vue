<template>
  <div>
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

  <v-toolbar color="green lighten-1" class="mb-5">
    <v-toolbar-title class="text-uppercase font-weight-bold mr-4 ">
      <picture>
        <img class="logo" src="../../assets/logo.png" alt="Logo" width="50" aspect-ratio="1/1">
      </picture>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn class="mr-4" :to="{name:'Home'}" >Home</v-btn>
      <v-btn class="mr-4" :to="{name:'Home'}" >Property</v-btn>
      <v-btn class="mr-4" :to="{name:'About'}">About</v-btn>
    </v-toolbar-items>
    <div v-if="isLogin">
      <v-btn class="tex-left" :to="{name:'Register'}" >Register</v-btn>
      <v-btn class="mr-4" :to="{name:'Login'}" >Login</v-btn>
    </div>
    <div v-else class="pf">
      <v-btn class="mr-3" @click="logout">Logout</v-btn>
      <img src="../../assets/pf.jpg" width="40" height="40" class="mr-3">
    </div>
  </v-toolbar>
    </div>
</template>

<script setup>
import { storeToRefs } from 'pinia';
import { computed } from 'vue';
// import Cookies from 'js-cookie';
// import { useAuthStore } from '.';

// const authStore = useAuthStore();
// const { isLoggedIn } = storeToRefs(authStore);
// const { logout} = authStore;

const isLogin = computed(()=>{
  if(isLoggedIn.value != undefined){
    return true;
  }
  return false;
})
// const cookieEmail=ref(Cookies.get('email'))
</script>

<style scoped>
.logo {
  border-radius: 50%;
  margin-right: 70%;

}
.pf {
  display: flex;
  align-items: center;
}
.pf img{
  border-radius: 50%;
}
</style>