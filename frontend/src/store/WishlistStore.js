import { defineStore } from "pinia";
import { computed, ref } from "vue";
import axios from "axios";

export const useWishlistStore = defineStore("wishlist", () => {
  const dataWishlist = ref({});
  const user_id = ref(parseInt(localStorage.getItem("user_id")));
  const property_id = ref(null);
  const getWishlist = ref(JSON.parse(localStorage.getItem("wishListData")));

  const getAllData = () => {
    axios
      .get(`/wishlist/${user_id.value}`)
      .then((res) => {
        getWishlist.value = res.data.data;
        localStorage.setItem("wishListData", JSON.stringify(getWishlist.value));
      })
      .catch((err) => {
        console.log(err);
      });
  };

  const addWishlist = (property_id) => {
    dataWishlist.value = {
      user_id: user_id.value,
      property_id: property_id,
    };
    axios
      .post("/wishlist", dataWishlist.value)
      .then(() => {
        getAllData();
      })
      .catch((err) => {
        console.log(err.response.data.status);
      });
  };

  // Computed
  const userWishlist = computed(() => {
    return getWishlist.value;
  });
  getAllData();

  return {
    addWishlist,
    property_id,
    getAllData,
    userWishlist,
  };
});
