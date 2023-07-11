<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center">
    <img :src="require('../../assets/register.jpg')" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <img :src="require('../../assets/profileIcon.png')" class="mt-5" width="50" />
      <h3 class="text-green-accent-4 mb-5">Login Account</h3>
      <v-expand-transition>
        <v-alert type="error" class="text-red-accent-4 text-left mb-5" v-if="isSuccess && errors" :text='errors'></v-alert>
      </v-expand-transition>
      <v-form fast-fail x="d-flex flex-column" v-model="isValide">
        <v-text-field type="email" clearable color="green-accent-4" label="Email" placeholder="Enter email address" v-model="email" :rules="rules.emailRules"></v-text-field>

        <v-text-field type="password" clearable color="green-accent-4" label="Password" name="password" placeholder="Enter password" v-model="password" :rules="rules.passwordRules"></v-text-field>

        <GoogleLogin :callback="callback" class=" my-5"></GoogleLogin>

        <v-btn type="button" @click="signIn" block class="mt-2 mb-5 bg-green-accent-4 text-white">Login</v-btn>
        <p>Don't have an account? | <router-link :to="{ name: 'Register' }" class="">Register Here</router-link></p>
      </v-form>
    </v-sheet>
  </v-row>
</template>
<script setup>
import { ref } from 'vue';
import { decodeCredential } from 'vue3-google-login';
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { isValide, isSuccess, errors } = storeToRefs(authStore);
const { login } = authStore;

const password = ref(null);
const email = ref(null);

const callback =  (res) => {
    console.log(decodeCredential(res.credential));
    const userDetail = decodeCredential(res.credential);
    const user = {
      username: userDetail.given_name + ' ' +  userDetail.family_name,
      email:userDetail.email,
      password:Math.floor(Math.random() * 10000000000),
      isGoogle:true,
    }
    login(user);
}
const signIn=()=>{
  const user={
    password: password.value,
    email: email.value,
  }
  login(user);
}


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
}</style>
