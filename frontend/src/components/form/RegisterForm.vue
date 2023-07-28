<template>
  <!-- <v-container fluid class=" my-10"> -->
  <!-- Resource: vuetify  -->
  <v-row justify="center" class="" align="center">
    <img
      :src="require('../../assets/register.jpg')"
      alt=""
      width="500"
      height="500"
    />
    <v-sheet class="m-10 w-33 bg-white pa-5" elevation="4">
      <div class="d-flex flex-column align-center">
        <img
          :src="require('../../assets/profileIcon.png')"
          class="mt-5"
          width="50"
        />
        <p class="text-lg-h5 mb-5 text-green-accent-4">Register Account</p>
      </div>
      <v-form fast-fail class="d-flex flex-column" v-model="isValide">
        <v-text-field
          clearable
          color="green-accent-4"
          label="Username"
          placeholder="Enter your username"
          v-model="username"
          :rules="rules.usernameRules"
        ></v-text-field>
        <v-text-field
          type="tel"
          clearable
          color="green-accent-4"
          label="Phone Number"
          placeholder="Enter phone number"
          v-model="phone_number"
          :rules="rules.phoneRules"
        ></v-text-field>
        <v-text-field
          type="email"
          clearable
          color="green-accent-4"
          label="Email"
          placeholder="Enter email address"
          v-model="email"
          :rules="rules.emailRules"
        ></v-text-field>
        <!-- display error message  -->
        <template v-if="errorMessage">
          <template v-if="errorMessage.errors.email">
            <span class="text-red-accent-4 text-left">{{
              errorMessage.errors.email[0]
            }}</span>
          </template>
        </template>
        <!--  -->

        <v-text-field
          color="green-accent-4"
          label="Password"
          name="password"
          placeholder="Enter password"
          v-model="password"
          :rules="rules.passwordRules"
          :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append-inner="showPassword = !showPassword"
          :type="showPassword ? 'text' : 'password'"
        ></v-text-field>
        <v-text-field
       
          name="password_confirmation"
          color="green-accent-4"
          label="Confirm Password"
          placeholder="Confirm Password"
          v-model="password_confirmation"
          :rules="rules.confirmRules"
          :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append-inner="showPassword = !showPassword"
          :type="showPassword ? 'text' : 'password'"
        ></v-text-field>
        <v-btn
          type="button"
          :disabled="!isValide"
          @click="signUp()"
          block
          class="mt-2 mb-5 bg-green-accent-4 text-white pa-5"
          >Register</v-btn
        >
        <div class="d-flex flex-column align-center">
          <p class="">Or Register With</p>
          <GoogleLogin :callback="callback" class="my-5"></GoogleLogin>
          <p class="ma-2">
            Already have an account? |
            <router-link :to="{ name: 'Login' }">Login Here</router-link>
          </p>
        </div>
      </v-form>
    </v-sheet>
  </v-row>
  <!-- </v-container> -->
</template>


<script setup>
import { ref, watch } from "vue";

import { decodeCredential } from "vue3-google-login";
// Pinia Store
import { storeToRefs } from "pinia";
import { useAuthStore } from "../../store/AuthStore";
const authStore = useAuthStore();
const { isValide, errors } = storeToRefs(authStore);
const { register } = authStore;

const showPassword = ref(false);
const username = ref(null);
const password = ref(null);
const email = ref(null);
const phone_number = ref(null);
const password_confirmation = ref(null);
const errorMessage = ref(null);

// Login with google
const callback = (res) => {
  console.log(decodeCredential(res.credential));
  const userDetail = decodeCredential(res.credential);
  const user = {
    username: userDetail.given_name + " " + userDetail.family_name,
    email: userDetail.email,
    password: Math.floor(Math.random() * 10000000000),
    isGoogle: true,
  };
  register(user);
};
// Login with form
const signUp = () => {
  const user = {
    username: username.value,
    password: password.value,
    password_confirmation: password_confirmation.value,
    phone_number: phone_number.value,
    email: email.value,
  };
  register(user);
};
watch(errors, (newValue, oldValue) => {
  console.log(`Count changed from ${oldValue} to ${newValue}`);
  errorMessage.value = newValue;
  console.log(errorMessage.value);
});

// Validation rules
const rules = ref({
  usernameRules: [
    (value) => !!value || "Username is required",
    (value) => (value && value.length >= 5) || "Username at least 5 characters",
  ],
  emailRules: [(value) => !!value || "Email is required"],
  phoneRules: [
    (value) => !!value || "Phone Number is required ",
    (value) => /^\+?[0]\d{8,20}$/.test(value) || "Phone Number is invalid",
  ],
  passwordRules: [
    (value) => !!value || "Password is required",
    (value) => (value && value.length >= 8) || "Password at least 8 characters",
  ],
  confirmRules: [
    (value) => !!value || "Confirm Password is required",
    (value) => (value && value == password.value) || "Password does not match!",
  ],
});
</script>

<style scoped>
.v-text-field {
  padding: 0;
  margin-bottom: 5px;
}

.v-input_details {
  display: none;
}
</style>
