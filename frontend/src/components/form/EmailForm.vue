<template>
  <v-row justify="center" align="center">
    <img
    :src="require('../../assets/forgot_password.png')" 
      alt=""
      width="500"
      height="500"
    />
    <v-sheet class="m-10 w-33 bg-white pa-8" elevation="4">
      <div class=" d-flex flex-column align-center">
      <img :src="require('../../assets/forgot_icon.png')" alt="" class="mt-5" width="80" />
      <h3 class="text-green-accent-4 mb-2">Forgot Password</h3>
      <p>Enter your email address</p><br>
      </div>
      <v-form ref="form" fast-fail class="d-flex flex-column">
        <v-text-field
        class="mb-5"
          ref="Email"
          color="green-accent-4"
          label="Email"
          placeholder="Enter email address"
          v-model="email"
          :rules="rules.email"
        ></v-text-field> 
        <v-btn
          v-if="email"
          :to="{ name: 'Code' }"
          @click="submitForm()"
          block
          class="mt-2 mb-5 bg-green-accent-4 text-white" 
         
          >Send</v-btn
          >
        <div class="button">
         
          <v-btn
            :to="{ name: 'Login' }"
            block
            class="mt-2 mb-5 bg-green-accent-4 text-white"
          
            >Back</v-btn
          >
        </div>
        
      </v-form>
    </v-sheet>
  </v-row>

</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      rules: {
        email: [
          (v) => !!v || "Email is required",
          (v) => /.+@.+\..+/.test(v) || "Email must be valid",
        ],
      },
    };
  },

  methods: {
    async submitForm() {
      if (this.$refs.form.validate()) {
        try {
          const response = await axios.post(
            "http://127.0.0.1:8000/api/reset_password_request",
            { email: this.email }
          );
          console.log(response.data);
        } catch (error) {
          console.error(error.response.data.error);
          
          // console.log(error.response.error);
        }
      }
    },
  },
};
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