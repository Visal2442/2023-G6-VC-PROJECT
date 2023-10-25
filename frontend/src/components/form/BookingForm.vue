<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center" class="mb-5">
    <img
      :src="require('../../assets/home/booking.png')"
      alt=""
      width="400"
      height="400"
    />
    <v-col xss="8" xs="10" sm="6" md="4" lg="5">
      <!-- Success Alert  -->
      <TheTransition id="transition">
        <v-alert
          v-model="isAlert"
          width="30%"
          icon="$success"
          title="Successful !"
          text="Please Check Your Email"
          class="bg-green-accent-3"
          closable
        ></v-alert>
      </TheTransition>
      <v-card ref="form" class="pa-8">
        <h2 class="text-center text-green-accent-4">Booking Form</h2>
        <v-form fast-fail class="d-flex flex-column" v-model="isValid">
          <v-text-field
            color="green-accent-4"
            ref="Your First Name"
            label="First Name"
            placeholder="Enter your first name"
            v-model="firstName"
            :rules="rule.firstRules"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Your Last Name"
            label="Last Name"
            placeholder="Enter your Last Name"
            v-model="lastName"
            :rules="rule.lastRules"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Phone Number"
            label="Phone Number"
            placeholder="Enter your phone number"
            v-model="phoneNumber"
            :rules="rule.phoneRules"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Email"
            label="Enter your email"
            placeholder="Enter your email"
            v-model="email"
            :rules="rule.emailRules"
          ></v-text-field>
          <v-row>
            <v-col>
              <p>Check in date:</p>
              <input
                type="date"
                class="checkInDate w-100 bg-grey-lighten-4 pa-3 rounded-sm"
                id="select_date"
                v-model="checkInDate"
                :rules="rule.checkInDateRules"
                :min="minDate"
              />
            </v-col>

            <p v-if="!isValidDate"></p>
            <v-col class="ma checkoutDate">
              <p>Check out date:</p>
              <input
                type="date"
                class="pa-3 w-100 rounded-sm bg-grey-lighten-4"
                v-model="checkOutDate"
                :rules="rule.checkOutDateRules"
                :min="minDate"
              />
            </v-col>
            <p v-if="!isValidDate"></p>
          </v-row>
          <BaseButton
            class="booking"
            type="primary-btn"
            :disabled="!isValid"
            @click="bookProperty()"
            block
            :loading="loading"
            >Book Now</BaseButton
          >
        </v-form>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import BaseButton from "../widget/BaseButton.vue";
import TheTransition from "../widget/TheTransition.vue";
import { useBookingStore } from "../../store/BookingStore";
import { mapActions } from "pinia";
import { useRouter } from "vue-router";
export default {
  data() {
    return {
      firstName: null,
      lastName: null,
      email: null,
      phoneNumber: null,
      checkInDate: null,
      checkOutDate: null,
      userId: localStorage.getItem("user_id"),
      propertyId: localStorage.getItem("property_id"),
      roomId: localStorage.getItem("room_id"),
      isAlert: false,
      loading: false,
      router: useRouter(),
      isValid: false,
    };
  },
  methods: {
    ...mapActions(useBookingStore, ["booking"]),
    async bookProperty() {
      const dataBooking = {
        first_name: this.firstName,
        last_name: this.lastName,
        email: this.email,
        phone_number: this.phoneNumber,
        check_in_date: this.checkInDate,
        check_out_date: this.checkOutDate,
        room_id: this.roomId,
        user_id: this.userId,
        property_id: this.propertyId,
      };
      this.loading = true;
      await this.booking(dataBooking);
      this.loading = false;
      this.resetInput();
      this.isAlert = true;
      this.isAlert = false;
      this.router.push("/");
    },
    // Reset the form data after the booking is successful
    resetInput() {
      this.firstName = null;
      this.lastName = null;
      this.email = null;
      this.phoneNumber = null;
      this.checkInDate = null;
      this.checkOutDate = null;
    },
  },
  computed: {
    isValidDate() {
      return new Date(this.checkInDate) >= new Date();
    },
    minDate() {
      return new Date().toISOString().split("T")[0];
    },
  },
  components: {
    BaseButton,
    TheTransition,
  },
};
</script>

<style scoped>
.checkoutDate {
  margin-left: 20px;
}

.booking {
  margin-top: 20px;
}

#transition {
  right: 0;
}
</style>
