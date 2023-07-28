<template>
  <!-- Resource: vuetify  -->
  <v-container fluid class=" my-10">
    <v-row justify="center" align="center">
      <img :src="require('../../assets/register.jpg')" alt="" width="500" height="500" />
      <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
        <div class=" d-flex flex-column align-center">
          <img :src="require('../../assets/profileIcon.png')" class="mt-5" width="50" />
          <h3 class="text-green-accent-4 mb-5">Login Account</h3>
        </div>
        <!-- Alert  -->
        <Transition name="error" mode="out-in">
          <v-alert type="error" v-if="errorMessage" closable class="text-red-accent-4 text-left mb-5"
            :text='errorMessage'>
          </v-alert>
        </Transition>
        <v-form fast-fail x="d-flex flex-column" v-model="isValide">
          <v-text-field type="email" clearable color="green-accent-4" label="Email" placeholder="Enter email address"
            v-model="email" :rules="rules.emailRules"></v-text-field>
          <v-text-field color="green-accent-4"  :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" label="Password" name="password" 
            placeholder="Enter password" v-model="password" :rules="rules.passwordRules"  
            @click:append-inner="showPassword = !showPassword" :type="showPassword ? 'text' : 'password'"></v-text-field>
          <v-card-actions>
            <v-col cols="auto pa-0" class="forgotPassword">
              <router-link :to="{ name: 'Email' }">Forgot Password?</router-link>
            </v-col>
          </v-card-actions>
          <div class=" d-flex flex-column align-center">
            <p class="">Or Login With</p>
            <GoogleLogin :callback="callback" class=" my-5"></GoogleLogin>
          </div>
          <v-btn type="button" @click="signIn" :disabled="!isValide" block
            class="mt-2 mb-5 bg-green-accent-4 text-white">Login</v-btn>
          <p>Don't have an account? | <router-link :to="{ name: 'Register' }" class="">Register Here</router-link></p>
        </v-form>
      </v-sheet>
    </v-row>
  </v-container>
</template>
<script setup>
import { ref, watch } from 'vue';
import { decodeCredential } from 'vue3-google-login';
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { isValide, errors } = storeToRefs(authStore);
const {login, register } = authStore;
const showPassword = ref(false);
const password = ref(null);
const email = ref(null);
const errorMessage = ref(false);

const callback = (res) => {
  const userDetail = decodeCredential(res.credential);
  const user = {
    username: userDetail.given_name + ' ' + userDetail.family_name,
    email: userDetail.email,
    password: Math.floor(Math.random() * 10000000000),
    isGoogle: true,
  }
  register(user);
}
const signIn = () => {
  const user = {
    password: password.value,
    email: email.value,
  }
  login(user);
}

watch(errors, (newValue) => {
  errorMessage.value = newValue;
})



// Validation rules 
const rules = ref({
  emailRules: [value => !!value || 'Email is required',],
  passwordRules: [value => !!value || 'Password is required',
  value => (value && value.length >= 8) || 'Password at least 8 characters'],
})

</script>

<style scoped>
.forgotPassword {
  /* margin-top: -10%; */
  margin-left: -2%;
}

.login {
  margin-top: -5%;
}

.google-lgo {
  margin-top: -10%;
  width: 70px;
}

.sms {
  text-align: start;
}

.error-enter-active,
.error-leave-active {
  transition: opacity 0.5s ease;
}

.error-enter-from,
.error-leave-to {
  opacity: 0;
}
</style>
