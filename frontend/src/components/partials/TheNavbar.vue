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
    <v-toolbar class="pa-3 pr-10" :style="{ background: backgroundNavbar }">
      <v-toolbar-items class="d-flex align-center">

        <img :src="require('../../assets/logo.png')" alt="" width="200">
        <!-- <v-img src="../../assets//dream-house-logo.png" width="400" height="400"></v-img> -->
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items class=" d-flex align-center">
        <div class="text-black">
          <template v-for="item in navItems" :key="item.name">
            <router-link :to="{ name: item.name }" class="text-button text-decoration-none text-black mr-7">{{ item.title }}</router-link>
          </template>
          <router-link v-if="cookieEmail" :to="{ name: 'Wishlist' }" class="text-button text-decoration-none text-black mr-7">Wishlist</router-link>
        </div>
        <!-- After Logged in -->
        <!-- <img id="logout" :src="require('../../assets/pf.jpg')" width="40" height="40" class="mr-3" v-if="cookieEmail"> -->
        <v-avatar id="logout" :image="require('../../assets/pf.jpg')" size="50" v-if="cookieEmail"></v-avatar>

        <!-- Before Login  -->
        <v-icon icon="mdi-dots-vertical" id="logged-in" v-else></v-icon>
        <v-menu activator="#logged-in">
          <v-list>
            <v-list-item>
              <v-btn variant="plain" :to="{ name: 'Register' }">Register</v-btn>
            </v-list-item>
            <v-list-item>
              <v-btn variant="plain" :to="{ name: 'Login' }">Login</v-btn>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-menu activator="#logout">
          <v-list>
          <v-list-item>
            <v-btn variant="plain" @click="logout">Logout</v-btn>
          </v-list-item>
          </v-list>
        </v-menu>

      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import Cookies from 'js-cookie';

// Pinia Store 
import { useAuthStore } from '../../store/AuthStore';
// import { storeToRefs } from 'pinia';
const authStore = useAuthStore();
const { logout } = authStore;
// const { token } = storeToRefs(authStore);

const navItems = ref([
  { title: 'Home', name: 'Home' },
  { title: 'Property', name: 'property' },
  { title: 'Map', name: 'Map' },
  { title: 'About', name: 'About' },
])

const isLoggedIn = ref(false);
const cookieEmail = ref(Cookies.get('email'));
// const newToken = ref(localStorage.getItem('token'));
watch(cookieEmail, (newValue, oldValue) => {
  console.log("New value :" , newValue);
  console.log("Old value :" , oldValue);
  if (newValue != null) {
    isLoggedIn.value = true;
  }
  else {
    isLoggedIn.value = false;
  }
})
// const loggedIn = computed(()=>{
//   console.log('computed');
//   return isLoggedIn.value;
// })

let scrollY = ref(0);
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
  z-index: 1000;
}

.router-link-active {
  border-bottom: 4px solid rgb(47, 255, 54);
}

#login-btn {
  background: none;
}

.pf {
  display: flex;
  align-items: center;
}

.pf img {
  border-radius: 50%;
}</style>