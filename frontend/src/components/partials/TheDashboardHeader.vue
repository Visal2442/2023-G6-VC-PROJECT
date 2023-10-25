<template>
  <div>
    <v-toolbar id="navbar" class="bg-white py-5" elevation="3">
      <v-toolbar-title>
        <div class="d-flex align-center">
          <h4 class="">DASHBOARD</h4>
        </div>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="d-flex align-center pr-10">
        <div class="mr-4">
          <v-toolbar-title class="font-weight-bold text-end">{{
            username
          }}</v-toolbar-title>
          <v-card-subtitle class="text-body-1 pa-0">{{
            email
          }}</v-card-subtitle>
        </div>
        <v-avatar id="logged-in" :image="profileUser" size="50"></v-avatar>
        <v-menu id="menu" activator="#logged-in">
          <v-list rounded="lg">
            <v-list-item class="pa-5">
              <div class="d-flex flex-column mb-10 justify-center">
                <p class="text-h6 mb-3">Your Profile</p>
                <div class="profile d-flex flex-row mb-5">
                  <div class="file-input">
                    <v-avatar
                      id="logout"
                      :image="profileUser"
                      size="60"
                    ></v-avatar>
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
                :to="{ name: 'Home' }"
                >Visit Site</BaseButton
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
import axios from "axios";
import BaseButton from "../widget/BaseButton.vue";
// Pinia Store
import { useAuthStore } from "../../store/AuthStore";
import Cookies from "js-cookie";
import { mapActions, mapState } from "pinia";

export default {
  data() {
    return {
      isLoggedOut: false,
      username: Cookies.get("username"),
      email: Cookies.get("email"),
      profileUser: Cookies.get("image"),
      profile: "",
    };
  },
  methods: {
    ...mapActions(useAuthStore, ["logout"]),
    getImage(event) {
      var file = event.target.files[0];
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
      this.profileUser = Cookies.get("image");
    },
    async singOut() {
      await this.logout();
      this.isLoggedOut = false;
      this.$router.push("/");
    },
  },
  components: {
    BaseButton,
  },
  computed: {
    ...mapState(useAuthStore, ["role"]),
  },
};
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
