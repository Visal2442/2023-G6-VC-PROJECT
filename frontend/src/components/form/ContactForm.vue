<template>
  <div>
    <div fluid class="d-flex">
      <v-seet
        class="d-flex flex-column flex-1 w-100 justify-center bg-green aling-center"
        elevation="4"
      >
        <h2 class="text-center mb-8">OUR INFORMATION</h2>
        <div class="our-phone d-flex flex-column mb-9 ml-16">
          <div class="phone d-flex">
            <v-icon size="24" color="withe">mdi mdi-phone</v-icon>
            <h3 class="ml-3">PHONE CALL</h3>
          </div>
          <p>+855 97 63 88651/16971291</p>
        </div>
        <div class="our-phone d-flex flex-column mb-9 ml-16 mr-10">
          <div class="location d-flex">
            <v-icon size="24" color="withe">mdi mdi-map</v-icon>
            <h3 class="ml-3">LOCATION</h3>
          </div>
          <p>
            BP511 St. 371 Phum Tropeang Chhuk (Borey Sorla), Sangkat Tek Thla,
            Khan Sen Sok, Phnom Penh, CAMBODIA
          </p>
        </div>
        <div class="our-phone d-flex flex-column mb-16 ml-16">
          <h3 class="">OUR TOP SERVICES</h3>
          <ul>
            <li>Rental house</li>
            <li>Rental room</li>
          </ul>
        </div>
      </v-seet>
      <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
        <TheTransition id="transition">
          <v-alert
            class="mr-5"
            v-model="alert"
            width="40%"
            type="success"
            icon="$success"
            title="Successful !"
            text="Your request was successfully!"
            closable
          ></v-alert>
        </TheTransition>
        <h2 class="text-center mb-9">CONTACT US</h2>
        <v-form fast-fail x="d-flex " v-model="isValide">
          <div class="d-flex">
            <v-text-field
              type="text"
              clearable
              color="green-accent-4"
              label="Username"
              name="username"
              placeholder="username"
              variant="outlined"
              class="mr-3"
              :rules="rule.usernameRules"
              v-model="username"
            ></v-text-field>
            <v-text-field
              type="text"
              clearable
              color="green-accent-4"
              label="Phone"
              name="phoneNumber"
              placeholder="Phone Number"
              variant="outlined"
              :rules="rule.phoneRules"
              v-model="phone_number"
            ></v-text-field>
          </div>
          <v-text-field
            type="Email"
            clearable
            color="green-accent-4"
            label="Email"
            name="email"
            placeholder="Your Email Address"
            :rules="rule.emailRules"
            v-model="email"
            variant="outlined"
          ></v-text-field>
          <div class="d-flex">
            <v-textarea
              clearable
              label="Your Message"
              placeholder="Message"
              color="green-accent-4"
              :rules="rule.messageRules"
              v-model="message"
              variant="outlined"
            ></v-textarea>
          </div>
          <div class="d-flex justify-end">
            <BaseButton
              type="primary-btn"
              :disabled="!isValide"
              @click="userContact()"
              :loading="loading"
            >
              Submit</BaseButton
            >
          </div>
        </v-form>
      </v-sheet>
    </div>
  </div>
</template>

<script>
import TheTransition from "../widget/TheTransition.vue";
import BaseButton from "../widget/BaseButton.vue";
import axios from "axios";
export default {
  data() {
    return {
      isValide: false,
      username: null,
      message: null,
      email: null,
      phone_number: null,
      alert: false,
      loading: false,
    };
  },
  methods: {
    remove() {
      (this.username = null),
        (this.phone_number = null),
        (this.email = null),
        (this.message = null);
    },
    async userContact() {
      const user = {
        username: this.username,
        phone_number: this.phone_number,
        email: this.email,
        message_request: this.message,
      };
      this.loading = true;
      await axios
        .post("/requestLandlord", user)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
      this.loading = false;
      this.remove();
      this.alert = true;
      this.isValide = false;
      setTimeout(() => {
        this.alert = false;
      }, 2000);
    },
  },
  components: {
    TheTransition,
    BaseButton,
  },
};
</script>

<style scoped>
#transition {
  right: 0;
}
</style>
