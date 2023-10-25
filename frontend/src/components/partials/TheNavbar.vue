<template>
  <div id="navbar">
    <!-- Large Screen -->
    <v-toolbar
      class="pa-4 px-12"
      :elevation="elevationNavbar"
      :style="{ background: backgroundNavbar }"
    >
      <v-toolbar-items class="d-flex align-center">
        <img :src="require('../../assets/logo.png')" alt="" width="200" />
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items class="d-flex align-center">
        <div class="text-black">
          <template v-for="item in navItems" :key="item.name">
            <router-link
              :to="{ name: item.name }"
              class="text-button text-decoration-none text-black mr-7"
              >{{ item.title }}</router-link
            >
          </template>
          <router-link
            :to="{ name: 'Wishlist' }"
            class="text-button text-decoration-none text-black mr-7"
            >Wishlist</router-link
          >
        </div>
        <!-- After Logged in -->
        <v-avatar
          id="logout"
          :image="profile"
          size="50"
          v-if="isLoggedIn"
        ></v-avatar>

        <!-- Before Login  -->
        <v-icon icon="mdi-dots-vertical" id="logged-in" v-else></v-icon>
        <v-menu id="menu" activator="#logged-in">
          <v-list rounded="lg">
            <v-list-item>
              <v-btn
                variant="plain"
                :to="{ name: 'Register' }"
                prepend-icon="mdi mdi-login"
                >Register</v-btn
              >
            </v-list-item>
            <v-list-item>
              <v-btn
                variant="plain"
                :to="{ name: 'Login' }"
                prepend-icon="mdi mdi-account"
                >Login</v-btn
              >
            </v-list-item>
          </v-list>
        </v-menu>
        <!-- After Logged in -->
        <v-menu activator="#logout">
          <v-list>
            <v-list-item class="pa-5">
              <div class="d-flex flex-column mb-10 justify-center">
                <p class="text-h6 mb-3">Your Profile</p>
                <div class="profile d-flex flex-row mb-5">
                  <div class="file-input">
                    <v-avatar id="logout" :image="profile" size="60"></v-avatar>
                    <input type="file" v-on:change="getImage" />
                  </div>
                  <div class="email-username ml-5">
                    <h3>{{ username }}</h3>
                    <v-card-subtitle class="pa-0"> {{ role }} </v-card-subtitle>
                    <p class="pa-0">{{ email }}</p>
                  </div>
                </div>
              </div>
              <BaseButton
                type="primary-btn"
                block
                class="ma-0 mb-5"
                v-if="role == 'landlord'"
                :to="{ name: 'LandlordDashboard' }"
                >Dashboard</BaseButton
              >
              <BaseButton
                type="primary-btn"
                block
                class="ma-0 mb-5"
                v-if="role == 'admin'"
                :to="{ name: 'Dashboard' }"
                >Dashboard</BaseButton
              >
              <BaseButton
                type="seconday-btn"
                block
                class="ma-0"
                @click="isLoggedOut = !isLoggedOut"
                >Logout</BaseButton
              >
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
          <v-btn
            class="cancel text-button text-blue mr-1"
            @click="isLoggedOut = !isLoggedOut"
            >Cancel</v-btn
          >
          <v-btn class="deleteBtn bg-red text-button px-10" @click="singOut">
            Log Out
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import Cookies from "js-cookie";
import axios from "axios";
import BaseButton from "../widget/BaseButton.vue";
import { mapActions, mapState } from "pinia";
import { useAuthStore } from "../../store/AuthStore";

export default {
  data() {
    return {
      isLoggedOut: false,
      navItems: [
        { title: "Home", name: "Home" },
        { title: "About US", name: "About" },
        { title: "Property", name: "property" },
        { title: "Map", name: "Map" },
        { title: "Contact Us", name: "Contact" },
      ],
      email: Cookies.get("email"),
      username: Cookies.get("username"),
      scrollY: 0,
      elevation: 4,
      background: "white",
    };
  },
  methods: {
    ...mapActions(useAuthStore, ["logout"]),
    onScroll(e) {
      this.scrollY = e.currentTarget.scrollY;
    },
    getImage(event) {
      var file = event.target.files[0];
      console.log(file);
      var form = new FormData();
      form.append("profile", file);
      axios.post("/imageProfile", form).then((response) => {
        this.profile = response.data;
        this.update();
      });
    },
    update() {
      let id = localStorage.getItem("user_id");
      const picture = {
        id: id,
        image: this.profile,
      };
      axios.post(`/editProfile`, picture).then((response) => {
        console.log(response);
      });
      Cookies.set("image", this.profile);
      // this.profileCookie= Cookies.get('image')
    },
    async singOut() {
      await this.logout();
      this.isLoggedOut = false;
      this.$router.push("/");
    },
  },
  computed: {
    ...mapState(useAuthStore, ["role", "token", "isLoggedIn", "profile"]),
    backgroundNavbar() {
      if (this.scrollY >= 60) {
        return this.background;
      }
      return "none";
    },
    elevationNavbar() {
      if (this.scrollY >= 60) {
        return this.elevation;
      }
      return 0;
    },
  },
  components: {
    BaseButton,
  },
  created() {
    window.addEventListener("scroll", this.onScroll);
  },
};
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
