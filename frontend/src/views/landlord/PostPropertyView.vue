<template>
  <div>
    <v-container fluid class=" my-5">
      <h1 class=" my-5">Add New Property</h1>
      <!-- TAB  -->
      <v-card>
        <v-tabs v-model="type" color="green-accent-4">
          <v-tab value="house">House</v-tab>
          <v-tab value="room">Room</v-tab>
        </v-tabs>
        <v-window v-model="type">
          <v-window-item value="house">
            <property-form :type="type"></property-form>
          </v-window-item>
          <v-window-item value="room">
            <property-form :type="type"></property-form>
          </v-window-item>
        </v-window>
      </v-card>

    </v-container>
  </div>
</template>

<script setup>
import PropertyForm from '../../components/form/PropertyForm.vue'
import { ref } from 'vue';

const type = ref('');




</script>

<style scoped></style>