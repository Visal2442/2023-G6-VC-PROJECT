<template>
  <v-container fluid class=" my-10">
  <v-row justify="center" align="center">
    <img :src="require('../../assets/forgot_password.png')" alt="" width="500" height="500" />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <div class=" d-flex flex-column align-center">
      <img :src="require('../../assets/forgot_icon.png')" alt="" class="mt-5" width="50"/>
      <h3 class="text-green-accent-4 mb-5">Reset Password</h3>
      <p>Code number will send you in email.</p><br>
      </div>
      <v-form ref="form"  class="d-flex flex-column">
       
        <v-text-field
          v-model="verificationCode"
          :rules="verificationCodeRules"
          clearable
          color="green-accent-4"
          label="Code"
          placeholder="Enter your code"
        ></v-text-field>
        <v-text-field
          v-model="password"
          :rules="passwordRules"
          clearable
          color="green-accent-4"
          label="Password"
          placeholder="Enter your password"
          type="password"
        ></v-text-field>
        <v-text-field
          v-model="passwordConfirmation"
          :rules="passwordConfirmationRules"
          clearable
          color="green-accent-4"
          label="Password Confirmation"
          placeholder="Enter your password confirmation"
          type="password"
        ></v-text-field>
        <v-btn
          :disabled="!isFormValid"
          v-if="verificationCode && passwordConfirmation && password"
          @click="resetPassword()"
          :to="{ name: 'Login' }"
          class="mt-2 mb-5 bg-green-accent-4 text-white"
        >
          Send
        </v-btn>
        <div class="button">

          <v-btn :to="{name:'Email'}" block class="mt-2 mb-5 bg-green-accent-4 text-white">Back</v-btn>
        </div>
      </v-form>
    </v-sheet>
  </v-row>
</v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      verificationCode: "",
      password: "",
      passwordConfirmation: "",
      message: "",
      statusCode: "",
    };
  },
  computed: {
    isFormValid() {
      return (
        this.$refs.form &&
        this.$refs.form.validate() &&
        this.verificationCode &&
        this.password &&
        this.passwordConfirmation
      );
    },
    verificationCodeRules() {
       return [
        (v) => !!v || "Verification code is required",
        (v) => v.length === 6 || "Verification code must be 6 digits",
        (v) => /^\d+$/.test(v) || "Verification code must only contain digits",
      ];
    },
    passwordRules() {
      return [
        (v) => !!v || "Password is required",
        (v) => v && v.length >= 8 || "Password must be at least 8 characters",
      ];
    },
    passwordConfirmationRules() {
      return [
        (v) => !!v || "Password confirmation is required",
        (v) => v === this.password || "Passwords do not match",
      ];
    },
  },
  methods: {
    resetPassword() {
      const data = {
        verification_code: this.verificationCode,
        password: this.password,
        password_confirmation: this.passwordConfirmation,
      };

      axios.post("http://127.0.0.1:8000/api/reset_password", data)
        .then((response) => {
          // Handle success response
          console.log(response.data);
          this.message = response.data.message;
          this.statusCode = response.data.status_code;
        })
        .catch((error) => {
          // Handle error response
          console.error(error.response.data);
          this.message = error.response.data.message;
          this.statusCode = error.response.data.status_code;
        });
    },
  },
};
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
</style>