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
          <router-link :to="{ name: 'Wishlist' }"
            class="text-button text-decoration-none text-black mr-7">Wishlist</router-link>
        </div>
        <!-- After Logged in -->
        <v-avatar id="logout" :image="require('../../assets/pf.jpg')" size="50" v-if="cookieEmail"></v-avatar>

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
const isLoggedOut = ref(false);
// Pinia Store 
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();
const { logout } = authStore;

const navItems = ref([
  { title: 'Home', name: 'Home' },
  { title: 'Property', name: 'property' },
  { title: 'Map', name: 'Map' },
  // { title: 'About', name: 'About' },
])
const cookieEmail = ref(Cookies.get('email'));

const scrollY = ref(0);
const elevation = ref(4);
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

.pf {
  display: flex;
  align-items: center;
}

.pf img {
  border-radius: 50%;
}
</style>