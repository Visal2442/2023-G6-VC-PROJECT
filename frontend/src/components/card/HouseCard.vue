<template>
    <v-card id="house-card" class="pb-3">
        <div>
            <v-img :src="property?.image" height="200"></v-img>
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
            <v-rating v-model="rating" density="compact" bg-color="orange-lighten-1"></v-rating>
        </v-card-actions>
        <v-card-actions>
            <div class="d-flex align-center">
                <v-icon @click="addToWishlist(property.id)" color="green" size='default' class="mr-4 boder"
                    icon="mdi mdi-bookmark"></v-icon>
            </div>
            <v-spacer></v-spacer>
            <BaseButton type="primary-btn" @click="getDetail(property.id)">More Detail</BaseButton>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { defineProps, ref } from "vue";
import BaseButton from "../widget/BaseButton.vue";
import { useRouter } from "vue-router";
import Cookies from 'js-cookie';

// Wishlist Store 
import { useWishlistStore } from '../../store/WishlistStore';
const wishlistStore = useWishlistStore();
const { wishlist } = wishlistStore;

const cookieEmail = ref(Cookies.get('email'));
const router = useRouter();
defineProps(["property"]);

const addToWishlist = (property_id) => {
    if (cookieEmail.value) {
        wishlist(property_id);
        alert('The House is added to your wishlist');
    }
    else {
        alert('Please Login to your account !');
    }
}

const getDetail = (property_id) => {
    router.push(`/detail/${property_id}`);
};

// Rating 
const rating = ref(3);

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