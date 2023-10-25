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
      <v-form fast-fail class="d-flex flex-column" v-model="validForm">
        <v-text-field
          clearable
          color="green-accent-4"
          label="Username"
          placeholder="Enter your username"
          v-model="username"
          :rules="rule.usernameRules"
        ></v-text-field>
        <v-text-field
          type="tel"
          clearable
          color="green-accent-4"
          label="Phone Number"
          placeholder="Enter phone number"
          v-model="phone_number"
          :rules="rule.phoneRules"
        ></v-text-field>
        <v-text-field
          type="email"
          clearable
          color="green-accent-4"
          label="Email"
          placeholder="Enter email address"
          v-model="email"
          :rules="rule.emailRules"
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
          :rules="rule.passwordRules"
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
          :rules="rule.confirmRules"
          :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append-inner="showPassword = !showPassword"
          :type="showPassword ? 'text' : 'password'"
        ></v-text-field>
        <v-btn
          type="button"
          :disabled="!validForm"
          @click="signUp()"
          block
          class="mt-2 mb-5 bg-green-accent-4 text-white pa-5"
          >Register</v-btn
        >
        <div class="d-flex flex-column align-center">
          <p class="">Or Register With</p>
          <!-- <GoogleLogin :callback="callback" class="my-5"></GoogleLogin> -->
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

<script>
// import { decodeCredential } from "vue3-google-login";
// Pinia Store
import { mapActions, mapState } from "pinia";
import { useAuthStore } from "../../store/AuthStore";
export default {
  data() {
    return {
      validForm: false,
      showPassword: false,
      username: null,
      password: null,
      email: null,
      phone_number: null,
      password_confirmation: null,
      errorMessage: null,
    };
  },
  methods: {
    ...mapActions(useAuthStore, ["register"]),
    // Login with google
    // async callback(res){
    //   const userDetail = decodeCredential(res.credential);
    //   const user = {
    //     username: userDetail.given_name + ' ' + userDetail.family_name,
    //     email: userDetail.email,
    //     image:userDetail.picture,
    //     isGoogle: true,
    //   };
    //   this.register(user);
    // },
    // Login with form
    async signUp() {
      const user = {
        username: this.username,
        password: this.password,
        password_confirmation: this.password_confirmation,
        phone_number: this.phone_number,
        email: this.email,
      };
      await this.register(user);
      if (this.isLoggedIn) {
        this.$router.push("/");
      }
    },
  },
  computed: {
    ...mapState(useAuthStore, ["isLoggedIn", "errors", "isValid"]),
  },
  watch: {
    errors(newValue, oldValue) {
      console.log(`Count changed from ${oldValue} to ${newValue}`);
      this.errorMessage = newValue;
      console.log(this.errorMessage);
    },
  },
};
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
