<template>
  <div>
    <v-container fluid>
      <!-- Summary  -->
      <v-row no-gutters>
        <v-col
          id="summary"
          rounded="lg"
          class="d-flex flex-column justify-center align-center py-5"
          :class="role == 'admin' ? 'bg-blue-lighten-4' : 'bg-red-lighten-4'"
        >
          <v-img
            v-if="role == 'admin'"
            :src="require('../../assets/dashboard/group.png')"
            width="50"
          ></v-img>
          <v-img
            v-if="role == 'landlord'"
            :src="require('../../assets/dashboard/booking.png')"
            width="50"
          ></v-img>
          <div
            class="d-flex flex-column align-center"
            :class="
              role == 'admin' ? 'text-light-blue-darken-1' : 'text-red-darken-1'
            "
          >
            <p v-if="role == 'admin'" class="font-weight-bold text-h6">Users</p>
            <p v-else class="font-weight-bold text-h6">Bookings</p>
            <p v-if="role == 'admin'">{{ userCount }}</p>
            <p v-else>{{ booking }}</p>
          </div>
        </v-col>
        <v-col
          id="summary"
          rounded="lg"
          class="d-flex flex-column justify-center align-center py-5"
          :class="
            role == 'admin' ? 'bg-purple-lighten-4' : 'bg-orange-lighten-4'
          "
        >
          <v-img
            v-if="role == 'admin'"
            :src="require('../../assets/dashboard/profile.png')"
            width="50"
          ></v-img>
          <v-img
            v-else
            :src="require('../../assets/dashboard/dollar.png')"
            width="50"
          ></v-img>
          <div
            class="d-flex flex-column align-center"
            :class="
              role == 'admin' ? 'text-purple-darken-1' : 'text-orange-darken-1'
            "
          >
            <p v-if="role == 'admin'" class="font-weight-bold text-h6">
              Customers
            </p>
            <p v-else class="font-weight-bold text-h6">Price</p>
            <p v-if="role == 'admin'">{{ customerCount }}</p>
            <p v-else>${{ price }}</p>
          </div>
        </v-col>
        <v-col
          v-if="role == 'admin'"
          id="summary"
          rounded="lg"
          class="bg-green-accent-1 d-flex flex-column justify-center align-center py-5"
        >
          <v-img
            :src="require('../../assets/dashboard/landlord.png')"
            width="50"
          ></v-img>
          <div class="text-green-accent-4 d-flex flex-column align-center">
            <p class="font-weight-bold text-h6">Landlords</p>
            <p>{{ landlordCount }}</p>
          </div>
        </v-col>
        <v-col
          id="summary"
          class="d-flex flex-column justify-center align-center py-5"
          :class="role == 'admin' ? 'bg-orange-lighten-4' : 'bg-blue-lighten-4'"
        >
          <v-img
            v-if="role == 'admin'"
            :src="require('../../assets/dashboard/home2.png')"
            width="50"
          ></v-img>
          <v-img
            v-else
            :src="require('../../assets/dashboard/home.png')"
            width="50"
          ></v-img>
          <div
            class="d-flex flex-column align-center"
            :class="
              role == 'admin' ? 'text-orange-darken-1' : 'text-blue-darken-1'
            "
          >
            <p class="font-weight-bold text-h6">Properties</p>
            <p v-if="role == 'admin'">{{ propertyCount }}</p>
            <p v-else>{{ userProperties.length }}</p>
          </div>
        </v-col>
      </v-row>
      <!-- Lanlord table  -->
      <v-row class="pa-1">
        <v-col>
          <v-sheet elevation="5" class="pa-5 w-100" rounded="lg">
            <div class="d-flex flex-column">
              <h2 class="pa-0 mb-8">Landlords</h2>
            </div>
            <table class="w-100">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>UserInfo</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th v-if="role == 'admin'">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(landlord, index) of allLandlords" :key="index">
                  <td>#{{ landlord.id }}</td>
                  <td>
                    <div class="d-flex align-center">
                      <v-avatar>
                        <v-img :src="landlord.image" width="60"></v-img>
                      </v-avatar>
                      <div class="ml-2">
                        <p class="font-weight-bold">{{ landlord.username }}</p>
                        <v-card-subtitle class="pa-0">{{
                          landlord.email
                        }}</v-card-subtitle>
                      </div>
                    </div>
                  </td>
                  <td>{{ landlord.phone_number }}</td>
                  <td>
                    <div class="d-flex">
                      <v-card-subtitle
                        class="pa-0 bg-green-lighten-5 rounded-lg text-green-accent-4 text-capitalize px-2 py-1 font-weight-bold"
                        >{{ landlord.role }}</v-card-subtitle
                      >
                    </div>
                  </td>
                  <td v-if="role == 'admin'">
                    <div class="d-flex align-center">
                      <v-icon
                        class="mdi mdi-pencil-outline mr-3"
                        size="small"
                        color="blue-accent-4"
                        @click="getData(landlord.id)"
                      >
                        <v-tooltip activator="parent" location="top"
                          >Edit</v-tooltip
                        >
                      </v-icon>
                      <v-icon
                        class="mdi mdi-trash-can-outline"
                        size="small"
                        color="red"
                        @click="deleteUserAccountByAddmin(landlord.id)"
                      >
                        <v-tooltip activator="parent" location="top"
                          >Delete</v-tooltip
                        >
                      </v-icon>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
    <!-- Edit user form  -->
    <v-dialog v-model="dialog" width="35%" class="">
      <v-card rounded="lg">
        <v-card-title class="pa-0 pa-3 bg-green-accent-4 text-white"
          >Edit User</v-card-title
        >
        <div class="w-100 bg-white pa-5">
          <v-form fast-fail x="d-flex flex-column">
            <v-text-field
              type="text"
              clearable
              color="green-accent-4"
              label="Username"
              v-model="userName"
              placeholder="Enter Your Username"
              class="pa-0"
              density="compact"
              variant="outlined"
              rounded="lg"
            ></v-text-field>
            <v-text-field
              type="email"
              clearable
              color="green-accent-4"
              label="Email"
              name="email"
              v-model="email"
              placeholder="Enter Your Email"
              density="compact"
              variant="outlined"
              rounded="lg"
            ></v-text-field>
            <v-select
              v-model="selected"
              :items="items"
              density="compact"
              variant="outlined"
              label="Role"
              placeholder="Role"
            ></v-select>
            <v-card-actions class="button">
              <v-btn
                class="cancel text-red"
                color="black"
                text
                @click="dialog = !dialog"
                >Cancel</v-btn
              >
              <BaseButton type="primary-btn" @click="editUser()"
                >Update</BaseButton
              >
            </v-card-actions>
          </v-form>
        </div>
      </v-card>
    </v-dialog>
    <!-- Delete user dialog  -->
    <v-dialog v-model="deleteUser" width="35%">
      <v-card>
        <v-sheet class="m-5 w-100 bg-white pa-5" elevation="4">
          <div class="cencelIcon">
            <v-icon class="mdi mdi-alert text-red"></v-icon>
          </div>
          <v-form fast-fail x="d-flex flex-column">
            <p align="center" class="mb-5 mt-5">
              Do you want to delete this user?
            </p>
            <v-card-actions class="button">
              <v-btn
                class="cancel text-button text-blue mr-1"
                @click="deleteUser = !deleteUser"
                >Cancel</v-btn
              >
              <v-btn
                class="deleteBtn bg-red text-overline text-white"
                @click="deleteUserAccount()"
                color="black"
              >
                Delete
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-sheet>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import axios from "axios";
import BaseButton from "@/components/widget/BaseButton.vue";
import Cookies from "js-cookie";
import { usePropertyStore } from "../../store/PropertyStore";
import { useAuthStore } from "../../store/AuthStore";
import { mapActions, mapState } from "pinia";
export default {
  data() {
    return {
      role: Cookies.get("role"),
      selected: "",
      dialog: false,
      userName: "",
      email: "",
      items: [
        { title: "Landlord", value: "landlord" },
        { title: "Customer", value: "customer" },
      ],
      price: 0,
      deleteUser: false,
      booking: [],
    };
  },
  methods: {
    ...mapActions(usePropertyStore, ["getAllProperties"]),
    ...mapActions(useAuthStore, ["getUsers", "getLandlords", "getCustomers"]),
    getData(user_id) {
      localStorage.setItem("userId", user_id);
      axios.get(`/userId/${user_id}`).then((res) => {
        console.log(res.data.data);
        this.userName = res.data.data.username;
        this.email = res.data.data.email;
        this.selected = res.data.data.role;
      });
      this.dialog = true;
    },
    getNumberOfBooking() {
      const id = localStorage.getItem("user_id");
      axios
        .get(`/numberOfBooking/`, { params: { user_id: id } })
        .then((res) => {
          this.booking = res.data.data.length;
          for (let item of res.data.data) {
            this.price += item["price"];
          }
        });
    },
    editUser() {
      const id = localStorage.getItem("userId");
      if (this.userName !== "" && this.email !== "" && this.selected !== "") {
        const userData = {
          username: this.userName,
          email: this.email,
          role: this.selected,
        };
        axios.put(`/updateUser/${id}`, userData).then(() => {
          this.dialog = false;
          this.displayUsers();
        });
      }
    },
    deleteUserAccountByAddmin(userId, role) {
      localStorage.setItem("userId", userId);
      localStorage.setItem("userRole", role);
      if (localStorage.getItem("userRole") !== "admin") {
        this.deleteUser = true;
      } else {
        alert("Can not delete admin account!");
      }
    },
    deleteUserAccount() {
      let id = localStorage.getItem("userId");
      axios
        .delete(`/delete_user/${id}`)
        .then(() => {
          this.displayUsers();
        })
        .catch((errors) => {
          console.log(errors);
        });
      this.deleteUser = false;
    },
  },
  computed: {
    ...mapState(useAuthStore, [
      "userCount",
      "customerCount",
      "landlordCount",
      "allLandlords",
    ]),
    ...mapState(usePropertyStore, ["userProperties", "propertyCount"]),
  },
  components: {
    BaseButton,
  },
  mounted() {
    this.getUsers();
    this.getAllProperties();
    this.getNumberOfBooking();
    this.getLandlords();
    this.getCustomers();
  },
};
</script>

<style scoped>
#summary {
  margin: 5px;
  border-radius: 10px;
}

table,
th,
td {
  /* border: none; */
  border-collapse: collapse;
}

thead th {
  border-bottom: 1px solid #b8b2b2;
  padding: 10px;
  text-align: start;
}

tbody td {
  border-bottom: 1px solid #b8b2b2;
  padding: 10px;
}
</style>
