import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export const useBookingStore = defineStore("booking", () => {
let isValide= ref(false);
const errors = ref('');
const router = useRouter();
  const booking = (booking) => {

    axios
      .post('/booking', booking)
      .then((res) => {
        console.log(res);
        router.push({name:'Home'});
        
      })
      .catch((err) => {
        errors.value = err.response.data;
      });
  };
  return {
    booking,
    isValide,
  };
});
