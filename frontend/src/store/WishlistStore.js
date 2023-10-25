import { defineStore } from "pinia";
import axios from "axios";

export const useWishlistStore = defineStore("wishlist", {
  state() {
    return {
      data_wish_list: {},
      user_id: parseInt(localStorage.getItem("user_id")),
      property_id: null,
      getWishlist: JSON.parse(localStorage.getItem("wishListData")),
    };
  },
  actions: {
    async getAllData() {
      await axios
        .get(`/wishlist/${this.user_id}`)
        .then((res) => {
          this.getWishlist = res.data.data;
          localStorage.setItem(
            "wishListData",
            JSON.stringify(this.getWishlist)
          );
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async addWishlist(property_id) {
      this.data_wish_list = {
        user_id: this.user_id,
        property_id: property_id,
      };
      await axios
        .post("/wishlist", this.data_wish_list)
        .then(() => {
          this.getAllData();
        })
        .catch((err) => {
          console.log(err.response.data.status);
        });
    },
    async removeWishlist(wishtList_id) {
      await axios
        .delete(`/wishlist/${wishtList_id}`)
        .then((res) => {
          this.getAllData();
          console.log(res);
        })
        .catch((err) => console.log(err));
    },
  },
});
