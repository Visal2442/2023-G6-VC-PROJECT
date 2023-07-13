<template>
    <v-card id="house-card" class="pb-3">
        <div>
            <v-img :src="property?.image"></v-img>
        </div>
        <v-card-title class="text-lg-h6">{{ property?.name }}</v-card-title>
        <div class="d-flex align-center">
            <v-card-subtitle>{{ property?.number_of_kitchen }} kitchen{{
                property?.number_of_kitchen > 1 ? "s" : ""
            }}</v-card-subtitle>
            <v-card-subtitle>{{ property?.number_of_bathroom }} bathroom{{
                property?.number_of_bathroom > 1 ? "s" : ""
            }}</v-card-subtitle>
            <v-card-subtitle>{{ property?.number_of_room }} room{{
                property?.number_of_room > 1 ? "s" : ""
            }}</v-card-subtitle>
        </div>
        <v-card-actions class="pa-0">
            <v-card-text class="text-green-accent-4 text-md-body-1">${{ property?.price }}/month</v-card-text>
            <v-card-text class="text-green-accent-4 text-md-body-1 text-end">$400/month</v-card-text>
        </v-card-actions>
        <v-card-actions>
            <div class="d-flex align-center">
                <!-- <v-avatar :image="require('../../assets/pf.jpg')" class="ml-2"></v-avatar> -->
                <!-- <v-card-subtitle>Sal</v-card-subtitle> -->
                <!-- <button >wishlist</button> -->
                <v-icon @click="wishlist(property.id)" color="green" size = 'default' class="mr-4 boder" icon="mdi mdi-bookmark"></v-icon>
                <v-icon @click="wishlist(property.id)" color="green" size = 'default' class="mr-4 boder" icon="mdi mdi-comment"></v-icon>
            </div>
            <v-spacer></v-spacer>
            <BaseButton type="bg-green-accent-3" @click="getDetail(property.id)">More Detail</BaseButton>
        </v-card-actions>
    </v-card>
</template>

<script setup>
// import axios from "axios";
import { defineProps } from "vue";
import BaseButton from "../widget/BaseButton.vue";
import { useRouter } from "vue-router";


// import { storeToRefs } from 'pinia';
import { useWishlistStore } from '../../store/WishlistStore';
const wishlistStore = useWishlistStore();
// const { property_id} = storeToRefs(wishlistStore);
const { wishlist } = wishlistStore;

const router = useRouter();
defineProps(["property"]);

const getDetail = (property_id) => {
    router.push(`/detail/${property_id}`);
};




// const wishlist = (property_id) => {

//     let user = parseInt(localStorage.getItem("user"));
//     console.log(user);
//     const dataWishlist = {
//         user_id: user,
//         property_id: property_id,
//     };
//     axios.post('/wishlist', dataWishlist)
//         .then((res) => {
//             console.log(res.data.success);

//         })
//         .catch((err) => {
//             console.log(err);
//         });
// }
    


</script>

<style scoped>
#house-card {
    border-radius: 12px;
}

.seconday-btn {
    border: 1px solid #00e676;
    margin-left: 2px;
}
</style>