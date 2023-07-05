<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center">
    <img src="../../assets/login.png" alt="" width="400" />
    <v-col xss="8" xs="10" sm="6" md="4" lg="4">
      <v-card ref="form" class="pa-5">
        <img src="../../assets/profileIcon.png" alt="" width="55" />
        <v-card-text>
          <v-text-field
            ref="Email"
            label="Email"
            color="green-accent-4"
            placeholder="Enter your email"
          ></v-text-field>
          <v-text-field
            ref="Password"
            v-model="Password"
            label="Password"
            color="green-accent-4"
            placeholder=".................."
          ></v-text-field>
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
  </v-row>
</template>
<script setup></script>

<style>
.forgotPassword {
  margin-top: -10%;
  margin-left: -2%;
}
.login {
  margin-top: -5%;
}
.google-lgo {
  margin-top: -10%;
  width: 70px;
}
</style>
