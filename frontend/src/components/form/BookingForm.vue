<template>
  <!-- Resource: vuetify  -->
  <v-row justify="center" align="center" class=" mb-5">
    <img
      :src="require('../../assets/home/booking.png')"
      alt=""
      width="400"
      height="400"
    />
    <v-col xss="8" xs="10" sm="6" md="4" lg="5">
      <v-card ref="form" class="pa-8">
        <h2 class="text-center text-green-accent-4">Booking Form</h2>
        <v-card-text>
          <v-text-field
            color="green-accent-4"
            ref="Your First Name"
            label="First Name"
            placeholder="Enter your first name"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Your Last Name"
            label="Last Name"
            placeholder="Enter your Last Name"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Phone Number"
            label="Phone Number"
            placeholder="Enter your phone number"
          ></v-text-field>
          <v-text-field
            color="green-accent-4"
            ref="Email"
            label="Enter your email"
            placeholder="Enter your email"
          ></v-text-field>
          <v-row>
            <v-col>
              <p>Check in date:</p>
              <input type="date" class="checkInDate w-100 bg-green-accent-1 pa-3 rounded-sm  " />
            </v-col>
            <v-col class="ma checkoutDate" >
              <p>Check out date:</p>
              <input type="date" class="bg-green-accent-1 pa-3 w-100 rounded-sm"/>
            </v-col>
          </v-row>
          <v-btn density="default" class="booking bg-green-accent-4 w-100">Booking Now</v-btn>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
</script>

<style scoped>
.checkoutDate {
  margin-left: 20px;
}
.booking {
  margin-top: 20px;
}
</style>