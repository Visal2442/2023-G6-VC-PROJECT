<template>
  <div>
    <v-container fluid class="mr-md-9">
      <!-- Banner  -->
      <v-row class="mt-7 mb-16 mx-md-9" align="center" id="banner">
        <v-col>
          <div class="pr-3">
            <h1 id="h1-banner" class="text-green-accent-3">
              Your House Is Here !
            </h1>
            <p>Welcome to our Rental House Website!</p>
            <p>
              Finding the perfect rental property can be a daunting task, but
              our website makes the process easy and stress-free. We offer a
              wide range of rental properties to suit every need and budget,
              from cozy room to spacious family homes.
            </p>
            <div class="align-center mt-5">
              <BaseButton type="primary-btn" :to="{ name: 'Contact' }"
                >Contact Us</BaseButton
              >
              <BaseButton type="seconday-btn" :to="{ name: 'About' }"
                >See More</BaseButton
              >
            </div>
          </div>
        </v-col>
        <v-col class="">
          <v-img
            :src="require('../../assets/home/living-room-2732939_1280.jpg')"
            width="640"
            class="home-img"
          ></v-img>
        </v-col>
      </v-row>

      <!-- Section 1 -->
      <v-row class="my-16 d-flex flex-column" align="center">
        <h1 id="h1-home">Available House</h1>
      </v-row>
      <v-row class="mt-7 mb-16 mx-md-9">
        <template v-for="(property, index) in properties">
          <v-col md="3" v-if="index < 4" :key="index">
            <house-card :property="property"></house-card>
          </v-col>
        </template>
      </v-row>

      <!-- Section 2 -->
      <v-row class="my-16 d-flex flex-column" align="center">
        <h1 id="h1-home">Know About Us!</h1>
      </v-row>

      <v-row class="mt-7 mb-16 mx-md-9" align="center">
        <v-col>
          <v-img
            :src="require('../../assets/home/mission3.jpeg')"
            width="640"
            class="home-img"
          ></v-img>
        </v-col>
        <v-col>
          <div class="pl-4">
            <h1 class="text-green-accent-3">Our Mission</h1>
            <p>
              At our rental house website, our mission is to make the process of
              finding and renting a home easy, convenient, and stress-free.
            </p>
            <br />
            <p>
              We understand that finding the perfect rental property can be a
              daunting task, which is why we're committed to providing a wide
              range of properties to suit every need and budget. Our advanced
              search functionality and personalized recommendations ensure that
              you find the perfect rental property that meets your specific
              criteria.
            </p>
            <div class="align-center mt-5">
              <BaseButton type="primary-btn" :to="{ name: 'Contact' }"
                >Contact Us</BaseButton
              >
            </div>
          </div>
        </v-col>
      </v-row>
      <!-- Section 3 -->
      <v-row class="mt-7 mb-16 mx-md-9" align="center">
        <v-col>
          <div class="pr-4">
            <h1 class="text-green-accent-3">Our Vision</h1>
            <p>
              At our rental house website, our vision is to be the leading
              provider of rental properties, offering a wide range of properties
              to suit every need and budget.
            </p>
            <br />
            <p>
              We strive to make the process of finding and renting a home easy,
              convenient, and stress-free for our customers. We believe that
              everyone deserves to live in a home they love, and we're committed
              to making that a reality.
            </p>
            <div class="align-center mt-5">
              <BaseButton type="primary-btn" :to="{ name: 'Contact' }"
                >Contact Us</BaseButton
              >
            </div>
          </div>
        </v-col>
        <v-col>
          <v-img
            :src="require('../../assets/home/vision.jpeg')"
            width="640"
            class="home-img"
          ></v-img>
        </v-col>
      </v-row>

      <v-row class="mt-7 mb-16 mx-md-9">
        <the-graph></the-graph>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import BaseButton from "../../components/widget/BaseButton.vue";
import TheGraph from "../../components/graph/TheGraph.vue";
import HouseCard from "@/components/card/HouseCard.vue";
// Property store
import { usePropertyStore } from "../../store/PropertyStore";
import { mapState, mapActions } from "pinia";
export default {
  computed: {
    ...mapState(usePropertyStore, ["properties"]),
  },
  methods: {
    ...mapActions(usePropertyStore, [
      "getAllProperties",
      "getPropertiesPerPage",
    ]),
  },
  components: {
    BaseButton,
    TheGraph,
    HouseCard,
  },
  mounted() {
    this.getAllProperties();
    this.getPropertiesPerPage();
  },
};
</script>

<style scoped>
.home-img {
  border-radius: 25px;
}

#banner-left {
  background: none;
}

#h1-banner {
  font-size: 60px;
}

#h1-home {
  margin: 20px 16px 0 0;
  border-bottom: 3px solid #00e676;
}

.seconday-btn {
  border: 1px solid #00e676;
  margin-left: 2px;
}
</style>
