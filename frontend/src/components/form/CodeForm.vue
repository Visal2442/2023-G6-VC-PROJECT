<template>
  <TheTransition id="warning">
    <v-alert
      class="mr-5"
      v-model="alert"
      width="40%"
      type="success"
      icon="$success"
      title="Successful !"
      text="Your code has sent in your gmail account!"
      closable
    ></v-alert>
  </TheTransition>
  <v-container fluid class="my-10">
    <v-row justify="center" align="center">
      <img
        :src="require('../../assets/forgot_password.png')"
        alt=""
        width="500"
        height="500"
      />
      <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
        <div class="d-flex flex-column align-center">
          <img
            :src="require('../../assets/forgot_icon.png')"
            alt=""
            class="mt-5"
            width="50"
          />
          <h3 class="text-green-accent-4 mb-5">Reset Password</h3>
          <p>Code number will send you in email.</p>
          <br />
        </div>
        <v-form ref="form" class="d-flex flex-column">
          <v-text-field
            v-model="verificationCode"
            color="green-accent-4"
            label="Code Number"
            :rules="[
              (v) => !!v || 'Verification code is required',
              (v) =>
                /^[0-9]{6}$/.test(v) ||
                'Verification code must be exactly 6 digits',
            ]"
          ></v-text-field>
          <v-text-field
            v-model="password"
            color="green-accent-4"
            label="Password"
       
            :rules="[
              (v) => !!v || 'Password is required',
              (v) =>
                (v && v.length >= 8) ||
                'Password must be at least 8 characters long',
            ]"
               :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append-inner="showPassword = !showPassword"
              :type="showPassword ? 'text' : 'password'"
          ></v-text-field>
          <v-text-field
            v-model="passwordConfirmation"
            label="Password Confirm"
            color="green-accent-4"
          
            :rules="[
              (v) => !!v || 'Password confirmation is required',
              (v) => v === password || 'Passwords do not match',
              (v) =>
                (v && v.length >= 8) ||
                'Password must be at least 8 characters long',
            ]"
               :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append-inner="showPassword = !showPassword"
          :type="showPassword ? 'text' : 'password'"
          ></v-text-field>
          <v-btn
            v-if="verificationCode && passwordConfirmation && password"
            @click="resetPassword()"
            class="mt-2 mb-5 bg-green-accent-4 text-white"
          >
            Send
          </v-btn>
          <div class="button">
            <v-btn
              :to="{ name: 'Email' }"
              block
              class="mt-2 mb-5 bg-green-accent-4 text-white"
              >Back</v-btn
            >
          </div>
        </v-form>
      </v-sheet>
    </v-row>
  </v-container>
</template>

<script setup>
import TheTransition from "../widget/TheTransition.vue";
import { storeToRefs } from "pinia";
import { useAuthStore } from "../../store/AuthStore";
const authStore = useAuthStore();

const { verificationCode, password, passwordConfirmation, alert } =
  storeToRefs(authStore);
const { resetPassword } = authStore;
</script>

<style scpoed>
.v-text-field {
  padding: 0;
  margin-bottom: 5px;
}

.v-input_details {
  display: none;
}

.button {
  display: flex;
  flex-direction: row;
  margin-left: 80%;
  margin-top: 4%;
  width: 20%;
  justify-content: flex-end;
}
#warning {
  position: absolute;
  top: 1;
  right: 0;
  z-index: 100000;
  margin-top: -2%;
  width: 30%;
  margin-right: 2.5%;
}
</style>