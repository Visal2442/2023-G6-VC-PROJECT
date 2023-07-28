<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center" class=" mb-5">
    <img :src="require('../../assets/home/booking.png')" alt="" width="400" height="400" />
    <v-col xss="8" xs="10" sm="6" md="4" lg="5">
      <!-- Success Alert  -->
      <TheTransition id="transition">
        <v-alert v-model="isAlert" width="30%" icon="$success" title="Successful !" text="Please Check Your Email"
          class="bg-green-accent-3" closable></v-alert>
      </TheTransition>
      <v-card ref="form" class="pa-8">
        <h2 class="text-center text-green-accent-4">Booking Form</h2>
        <v-form fast-fail class="d-flex flex-column" v-model="isValide">
          <v-text-field color="green-accent-4" ref="Your First Name" label="First Name"
            placeholder="Enter your first name" v-model="firstName" :rules="rules.firstRules"></v-text-field>
          <v-text-field color="green-accent-4" ref="Your Last Name" label="Last Name" placeholder="Enter your Last Name"
            v-model="lastName" :rules="rules.lastRules"></v-text-field>
          <v-text-field color="green-accent-4" ref="Phone Number" label="Phone Number"
            placeholder="Enter your phone number" v-model="phoneNumber" :rules="rules.phoneRules"></v-text-field>
          <v-text-field color="green-accent-4" ref="Email" label="Enter your email" placeholder="Enter your email"
            v-model="email" :rules="rules.emailRules"></v-text-field>
          <v-row>
            <v-col>
              <p>Check in date:</p>
              <input type="date" class="checkInDate w-100 bg-grey-lighten-4 pa-3 rounded-sm" id="select_date"
                v-model="checkInDate" :rules="rules.checkInDateRules" :min="minDate" />
            </v-col>

            <p v-if="!isValidDate"></p>
            <v-col class="ma checkoutDate">
              <p>Check out date:</p>
              <input type="date" class="pa-3 w-100 rounded-sm bg-grey-lighten-4" v-model="checkOutDate"
                :rules="rules.checkOutDateRules" :min="minDate" />
            </v-col>
            <p v-if="!isValidDate"></p>
          </v-row>
          <BaseButton class="booking" type="primary-btn" :disabled="!isValide" @click="bookProperty()" block
            :loading="loading">Book Now</BaseButton>
        </v-form>
      </v-card>
    </v-col>
  </v-row>
</template>

<script setup>

import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import { storeToRefs } from 'pinia';
import { useBookingStore } from '../../store/BookingStore';
import BaseButton from '../widget/BaseButton.vue';
import TheTransition from '../widget/TheTransition.vue';

const BookingStore = useBookingStore();
const { booking } = BookingStore;
const { isValide } = storeToRefs(BookingStore);
const loading = ref(false);
const router = useRouter();

const firstName = ref(null);
const lastName = ref(null);
const email = ref(null);
const phoneNumber = ref(null);
const checkInDate = ref(null);
const checkOutDate = ref(null);
const userId = ref(localStorage.getItem('user_id'))
const propertyId = ref(localStorage.getItem('property_id'))
const roomId = ref(localStorage.getItem('room_id'))
const isAlert = ref(false);

const bookProperty = () => {
  const dataBooking = {
    first_name: firstName.value,
    last_name: lastName.value,
    email: email.value,
    phone_number: phoneNumber.value,
    check_in_date: checkInDate.value,
    check_out_date: checkOutDate.value,
    room_id: roomId.value,
    user_id: userId.value,
    property_id: propertyId.value,
  }
  booking(dataBooking);
  loading.value = true;
  setTimeout(() => (
    loading.value = false,
    resetInput(),
    isAlert.value = true
  ), 12000)
  setTimeout(() => (
    isAlert.value = false,
    setTimeout(() => (
      router.push('/')
    ), 1000)
  ), 13500)
}
// Reset the form data after the booking is successful
const resetInput = () => {
  firstName.value = null;
  lastName.value = null;
  email.value = null;
  phoneNumber.value = null;
  checkInDate.value = null;
  checkOutDate.value = null;
}

const isValidDate = computed(() => {
  const selected = new Date(checkInDate.value);
  const today = new Date();
  return selected >= today;
});
const minDate = computed(() => {
  const today = new Date().toISOString().split('T')[0];
  return today;
});


// Validation rules 
const rules = ref({
  firstRules: [value => !!value || 'First name is required'],
  lastRules: [value => !!value || 'Last name is required'],
  emailRules: [value => !!value || 'Email is required',
  value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Email must be valid',],
  phoneRules: [value => !!value || 'Phone Number is required ',
  value => /^\+?[0]\d{8,20}$/.test(value) || 'Phone Number is invalid'],
  checkInDateRules: [value => !!value || 'check in date is required'],
  checkOutDateRules: [value => !!value || 'check out date is required'],
})
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
}</style>