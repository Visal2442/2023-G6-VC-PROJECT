import { defineStore } from "pinia";
import axios from "axios";

export const useBookingStore = defineStore("booking", {
  state: () => {
    return {
      errors: "",
    };
  },
  actions: {
    async booking(booking) {
      await axios
        .post("/booking", booking)
        .then(() => {})
        .catch((err) => {
          this.errors = err.response.data;
        });
    },
  },
});
