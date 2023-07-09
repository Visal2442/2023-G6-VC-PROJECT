<template>
  <div>
  <!-- Resource: vuetify  -->
  <v-row justify="center" class="" align="center">
    <img src="../../assets/register.jpg" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-5" elevation="4">
      <img src="../../assets/profileIcon.png" class="mt-5" width="50" />
      <p class=" text-lg-h5 mb-5 text-green-accent-4">Register Account</p>
      <v-form fast-fail class="d-flex flex-column" v-model="isValide">
        <v-text-field clearable color="green-accent-4" label="Username" placeholder="Enter your username" v-model="username" :rules="rules.usernameRules"></v-text-field>
        <v-text-field type="tel" clearable color="green-accent-4" label="Phone Number" placeholder="Enter phone number" v-model="phone_number" :rules="rules.phoneRules"></v-text-field>
        <v-text-field type="email" clearable color="green-accent-4" label="Email" placeholder="Enter email address" v-model="email" :rules="rules.emailRules"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.email">{{ errors.email.length !== 0 ? errors.email[0] : '' }}</span>
        <v-text-field type="password" clearable name="password" color="green-accent-4" label="Password" placeholder="Enter password" v-model="password" :rules="rules.passwordRules"></v-text-field>
        <v-text-field type="password" clearable name="password_confirmation" color="green-accent-4" label="Confirm Password" placeholder="Confirm Password" v-model="password_confirmation" :rules="rules.confirmRules"></v-text-field>
        <v-btn type="button" @click="register()" block class="mt-2 mb-5 bg-green-accent-4 text-white pa-5">Create</v-btn>
        <p class=" tw-text-amber-500">Or Login With</p>
        <router-link to=""><img src="../../assets/google.png" alt="" width="50" /></router-link>
        <hr>
        <p class="ma-2">Already have an account? | <router-link to="/login">Login Here</router-link></p>
      </v-form>

      <v-alert v-model="alert.show" v-if="isSuccess" :type="alert.type" :dismissible="false">
        {{ alert.message }}
      </v-alert>

    </v-sheet>
  </v-row>
  <div>
    <!-- <template v-if="login"> -->
      <GoogleLogin :callback="callback"></GoogleLogin>
    <!-- </template> -->
  </div>
</div>
</template>


<script setup>
import { ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { username, password, phone_number, email, password_confirmation, errors, isSuccess, alert, isValide} = storeToRefs(authStore);
const { register } = authStore;

// const login = ref(false);

const callback =  (res) => {
    console.log(decodeCredential(res.credential));
}
// const log = () => {
//   login.value = true;
// }
// Reset cookie (testing)
// const getCookie = () => {
//   document.cookie = 'g_state=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT; secure';
//   location.reload();
// }
// Validation rules 
const rules = ref({
  usernameRules:[ value => !!value || 'Username is required',
                  value => (value && value.length >= 5) || 'Username at least 5 characters',],
  emailRules: [   value => !!value || 'Email is required',],
  phoneRules: [   value => !!value || 'Phone Number is required ',
                  value => (value || '').length >= 8 || 'Phone at least 8 digits ',],
  passwordRules:[ value => !!value || 'Password is required',
                  value => (value && value.length >= 8) || 'Password at least 8 characters'],
  confirmRules:[  value => !!value || 'Confirm Password is required',
                  value => (value && value.length >= 8) || 'Confirm Password at least 8 characters'],
})

watch(isSuccess, (value) => {
  if (value) {
    // set the alert properties when the registration is successful
    alert.value.show = true;
    alert.value.type = 'success';
    alert.value.message = 'Registration successful!';
  }
});






</script>

<style scoped>
.v-text-field {
  /* background: whitesmoke; */
  padding: 0;
  margin-bottom: 5px;
}

.v-input_details {
  display: none;
}</style>