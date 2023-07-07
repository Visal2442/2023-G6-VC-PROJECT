<template>
  <!-- Resource: vuetify  -->
  <!-- <v-row justify="center" align="center">
    <img src="../../assets/login.png" alt="" width="400" />
    <v-col xss="8" xs="10" sm="6" md="4" lg="4">
      <v-card ref="form" class="pa-5">
        <img src="../../assets/profileIcon.png" alt="" width="55" />
        <v-card-text>
          <v-text-field
            ref="Email"
            label="Email"
            v-model="email"
            color="green-accent-4"
            placeholder="Enter your email"
          ></v-text-field>
          <div class="sms">
             <span class="text-red-accent-4 text-left" v-if="isSuccess && errors.email" >{{ errors.email.length !== 0 ? errors.email[0]:'' }}</span>
            <span class="text-red-accent-4 text-left" v-if="errors && errors.email">{{ errors.email[0] }}</span>
            {{ errors }}
            {{ isSuccess }}
          </div>

          <v-text-field
            ref="Password"
            v-model="password"
            label="Password"
            color="green-accent-4"
            placeholder=".................."
          ></v-text-field>
          <div class="sms">
            <span class="text-red-accent-4 text-left" v-if="errors && errors.password">{{ errors.password[0] }}</span>
          </div>

          <v-card-actions>
            <v-col cols="auto pa-0" class="forgotPassword">
              <router-link to="/">Forgot Password?</router-link>
            </v-col>
          </v-card-actions>
          <router-link to=""
            ><img src="../../assets/google.png" alt="" class="google-lgo"
          /></router-link>
          <v-card-actions>
            <v-col cols="auto pa-0 w-100">
              <v-btn
                width="100%"
                type="button"
                class="login bg-green-accent-4 text-white"
                @click="login()"
                >Login</v-btn>
            </v-col>
          </v-card-actions>
        </v-card-text>
        <v-card-actions class="justify-center">
          <p>Don't have account?</p>|
          <router-link to="/register">Register here</router-link>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row> -->

    <!-- Resource: vuetify  -->
    <v-row justify="center" align="center">
    <img src="../../assets/register.jpg" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <img src="../../assets/profileIcon.png" class="mt-5" width="50" />
      <h3 class="text-green-accent-4 mb-5">Login Account</h3>
      <v-form fast-fail class="d-flex flex-column">
      
        <v-text-field color="green-accent-4" label="Email" placeholder="Enter email address" 
          v-model="email"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess || errors" >{{ errors.email !== undefined ? errors.email[0]: errors}}</span>


        <v-text-field type="password" name="password" color="green-accent-4" label="Password" placeholder="Enter password"
           v-model="password"></v-text-field>
        <span class="text-red-accent-4 text-left" v-if="isSuccess" >{{ errors.password !== undefined ? errors.password[0]:'' }}</span>

        <router-link to=""><img src="../../assets/google.png" alt="" width="50" /></router-link>

        <v-btn type="button" @click="login" block class="mt-2 mb-5 bg-green-accent-4 text-white">Login</v-btn>
        <p>Don't have an account? | <router-link :to="{name:'Register'}" class="">Register Here</router-link></p>
      </v-form>
    </v-sheet>
  </v-row>
</template>
<script setup>
import { storeToRefs } from 'pinia';
import { useAuthStore } from '../../store/AuthStore';
const authStore = useAuthStore();

const { email,password, errors,isSuccess } = storeToRefs(authStore);
const { login } = authStore;

</script>

<style>
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
.sms{
  text-align: start;
}
</style>
