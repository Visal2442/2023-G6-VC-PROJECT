import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useBookingStore = defineStore("booking", () => {
  let isValide = ref(false);
  const errors = ref("");
  const booking = (booking) => {
    axios.post("/booking", booking)
      .then(() => {})
      .catch((err) => {
        errors.value = err.response.data;
      });
  };
  return {
    booking,
    isValide,
  };
});
