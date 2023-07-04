<template>
    <!-- Resource: vuetify  -->
    <v-row justify="center" color: green>
      <img
        src="../../assets/register.jpg"
        alt=""
        width="400"
        class="align-self-center"
      />
      <v-col xss="8" xs="10" sm="6" md="4" lg="4">
        <v-card ref="form" class="pa-5">
          <img src="../../assets/profileIcon.png" class="mt-5" width="50" />
          <h3 class="color-green-accent-4 text-green-accent-4" >Register Account</h3>
          <v-text-field
            color="green-accent-4"
            label="Full Name"
            placeholder="Enter your name"
            variant="underlined"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            label="Phone Number"
            placeholder="Enter your number phone"
            variant="underlined"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            label="Email"
            placeholder="Enter your email address"
            variant="underlined"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            label="Password"
            placeholder="Enter new password"
            variant="underlined"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            label="Confirm Password"
            placeholder="Confirm Password"
            variant="underlined"
          ></v-text-field>
          <router-link to=""
            ><img src="../../assets/google.png" alt="" width="50"
          /></router-link>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-col cols="auto pa-0">
              <v-btn density="default" class="bg-green-accent-4 text-white mt-n12"
                >Register</v-btn
              >
            </v-col>
          </v-card-actions>
          <v-card-actions class="justify-center mt-n5 ">
            <p>Already have an account?</p>
            |
            <router-link to="/login" class="">Login Here</router-link>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </template>

<script>

</script>

<style>

</style>