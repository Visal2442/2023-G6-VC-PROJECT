import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useWishlistStore = defineStore("wishlist", () => {
  const dataWishlist = ref({});
  const user = ref(null);
  const property_id = ref(null);
  const getWishlist = ref([]);

  const wishlist = (property_id) => {
    user.value = parseInt(localStorage.getItem("user_id"));
    dataWishlist.value = {
      user_id: user.value,
      property_id: property_id,
    };
    axios
      .post("/wishlist", dataWishlist.value)
      .then((res) => {
        console.log(res.data);
      })
      .catch((err) => {
        console.log(err);
      });
  };

  user.value = parseInt(localStorage.getItem("user_id"));
  axios
    .get(`/wishlist/${user.value}`)
    .then((res) => {
      getWishlist.value = res.data.data;
    })
    .catch((err) => {
      console.log(err);
    });

  return {
    wishlist,
    property_id,
    getWishlist,
  };
});
