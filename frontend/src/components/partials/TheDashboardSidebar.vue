<template>
  <nav>
    <v-navigation-drawer id="sidebar" v-model="drawer" class="pa-5">
      <v-list-item>
        <v-img
          :src="require('../../assets/logo-transparent.png')"
          class="mb-7 mt-2"
        ></v-img>
      </v-list-item>
      <v-divider></v-divider>
      <v-list flat>
        <v-list-item
          prepend-icon="mdi-view-dashboard"
          title="Dashboard"
          router
          :to="role == 'admin' ? '/dashboard/admin' : '/dashboard/landlord'"
        ></v-list-item>
        <v-list-item
          v-if="role == 'landlord'"
          prepend-icon="mdi-home-plus"
          title="Add Property"
          router
          :to="{ name: 'Post' }"
        ></v-list-item>
        <v-list-item
          prepend-icon="mdi-home-group"
          title="Properties"
          router
          :to="{
            name: role == 'admin' ? 'AdminProperties' : 'LandlordProperties',
          }"
        ></v-list-item>
        <v-list-item
          v-if="role == 'admin'"
          prepend-icon="mdi-account-group"
          title="All Users"
          router
          :to="{ name: 'Users' }"
        ></v-list-item>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script setup>
import { ref } from "vue";
const drawer = ref(true);
import Cookies from "js-cookie";

const role = Cookies.get("role");
</script>

<style scoped>
#navbar {
  position: sticky;
  top: 0;
  z-index: 2000;
}

#sidebar {
  position: static;
}
.v-list-item--active {
  /* background: #00E676; */
  color: #00e676;
}
</style>
