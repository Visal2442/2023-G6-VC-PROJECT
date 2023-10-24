<template>
  
  <v-container fluid class=" my-10">
  <v-row justify="center" align="center">
    <img :src="require('../../assets/forgot_password.png')" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <div class="d-flex flex-column align-center">
        <img :src="require('../../assets/forgot_icon.png')" alt="" class="mt-5" width="80" />
        <h3 class="text-green-accent-4 mb-2">Forgot Password</h3>
        <p>Enter your email address</p>
        <br/>
      </div>
      <v-form ref="form" fast-fail class="d-flex flex-column">
        <v-text-field class="mb-5" ref="Email" color="green-accent-4" label="Email" placeholder="Enter email address"
          v-model="emailSend" :rules="rule.emailRules" :error-messages="message"></v-text-field>
        <v-btn v-if="emailSend" @click="sendMail()" block class="mt-2 mb-5 bg-green-accent-4 text-white" :loading="loading">Send</v-btn>
        <div class="button">
          <v-btn :to="{ name: 'Login' }" block class="mt-2 mb-5 bg-green-accent-4 text-white">Back</v-btn>
        </div>
      </v-form>
    </v-sheet>
  </v-row>
  </v-container>
</template>

<script setup>
import { ref } from 'vue';

// Auth store 
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();
const { emailSend, message, } = storeToRefs(authStore);
const { sendEmail } = authStore;

const loading = ref(false);
const sendMail = ()=>{
  sendEmail();
  loading.value = true;
  setTimeout(()=>(loading.value = false), 4000);
  
}
</script>

<style scoped>
.v-text-field {
  /* background: whitesmoke; */
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
</style>