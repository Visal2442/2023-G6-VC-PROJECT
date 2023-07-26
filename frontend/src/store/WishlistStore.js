import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useWishlistStore = defineStore("wishlist", () => {
  const data_wish_list = ref({});
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
    data_wish_list.value = {
      user_id: user_id.value,
      property_id: property_id,
    };
    axios
      .post("/wishlist", data_wish_list.value)
      .then(() => {
        getAllData();
      })
      .catch((err) => {
        console.log(err.response.data.status);
      });
  };
  const removeWishlist=(wishtList_id)=>{
    axios.delete(`/wishlist/${wishtList_id}`)
    .then(res=>{
      getAllData();
      console.log(res);
    })
    .catch(err=>console.log(err));
  }

  getAllData();

  return {
    addWishlist,
    property_id,
    getAllData,
    removeWishlist,
    getWishlist
  };
});
