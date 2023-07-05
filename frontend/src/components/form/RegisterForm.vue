<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center">
    <img src="../../assets/register.jpg" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <img src="../../assets/profileIcon.png" class="mt-5" width="50" />
      <h3 class="text-green-accent-4 mb-5">Register Account</h3>
      <v-form fast-fail class="d-flex flex-column">
        <v-text-field clearable color="green-accent-4" label="Username" placeholder="Enter your username"
           v-model="username"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.username" >{{ errors.username.length !== 0 ? errors.username[0]:'' }}</span>

        <v-text-field color="green-accent-4" label="Phone Number" placeholder="Enter phone number" 
          v-model="phone_number"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.phone_number" >{{ errors.phone_number.length !== 0 ? errors.phone_number[0]:'' }}</span>

        <v-text-field color="green-accent-4" label="Email" placeholder="Enter email address" 
          v-model="email"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.email" >{{ errors.email.length !== 0 ? errors.email[0]:'' }}</span>

        <v-text-field type="password" name="password" color="green-accent-4" label="Password" placeholder="Enter password"
           v-model="password"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.password" >{{ errors.password.length !== 0 ? errors.password[0]:'' }}</span>

        <v-text-field  type="password" name="password_confirmation" color="green-accent-4" label="Confirm Password"
          placeholder="Confirm Password" v-model="confirm_password"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.password" >{{ errors.password.length !== 0 ? errors.password[0]:'' }}</span>

        <router-link to=""><img src="../../assets/google.png" alt="" width="50" /></router-link>
        <v-btn type="button" @click="register()" block class="mt-2 mb-5 bg-green-accent-4 text-white">Create</v-btn>
        <p>Already have an account? | <router-link to="/login" class="">Login Here</router-link></p>
      </v-form>
    </v-sheet>
  </v-row>
</template>

<script setup>
// import { ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { username, password, phone_number, email, confirm_password, errors, isSuccess } = storeToRefs(authStore);
const { register } = authStore;
 // Register



</script>

<style>
.v-text-field{
  /* background: whitesmoke; */
  padding: 0;
  margin-bottom: 5px;
}
.v-input_details{
  display: none;
}
</style>