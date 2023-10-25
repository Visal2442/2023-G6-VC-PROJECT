<template>
  <div :class="[isFound ? '' : 'no-result']">
    <!-- Warning and Success Alert  -->
    <TheTransition>
      <v-alert
        id="transition"
        v-model="isAlert"
        :class="alertBackground"
        width="30%"
        :icon="alertIcon"
        :text="alertMessage"
        closable
      >
        <v-progress-linear
          v-model="progress"
          bg-color="green"
          absolute
          bottom
        ></v-progress-linear>
      </v-alert>
    </TheTransition>
    <v-container fluid class="mr-md-9">
      <div>
        <div class="w-75 ma-auto">
          <h1>{{ emoji }}</h1>
          <SearchLocation
            @onSearch="onSearch"
            @onInput="onInput"
          ></SearchLocation>
          <v-row>
            <v-col>
              <div class="my-5 font-weight-black">Filter By Type</div>
              <FilterType @onSelect="onSelect"></FilterType>
            </v-col>
            <v-col cols="7">
              <div class="text-center my-5 font-weight-black">
                Filter By Price
              </div>
              <FilterByPrice @onPrice="onPrice"></FilterByPrice>
            </v-col>
          </v-row>
        </div>
        <v-container fluid class="ml-md-9">
          <v-row class="mr-md-10" v-if="isFound">
            <v-col md="3" v-for="(property, i) of properties" :key="i">
              <v-skeleton-loader type="card" :loading="loading">
                <house-card
                  :property="property"
                  @rateStar="rateStar"
                  @alert="alert"
                ></house-card>
              </v-skeleton-loader>
            </v-col>
          </v-row>
          <v-row v-else>
            <v-col
              class="text-center d-flex flex-column justify-center align-center"
            >
              <h1 align="center" class="text-black">{{ notFoundMessage }}</h1>
              <v-img
                :src="require('../../assets/not_found/no_result.gif')"
                width="500"
              ></v-img>
            </v-col>
          </v-row>
        </v-container>
        <v-pagination
          v-if="isFound"
          v-model="pagination.current"
          :length="pagination.total"
          :total-visible="7"
          @click="onPageChange()"
        ></v-pagination>
      </div>
    </v-container>
  </div>
</template>

<script>
import SearchLocation from "@/components/search/SearchLocation.vue";
import FilterType from "@/components/search/FilterType.vue";
import FilterByPrice from "@/components/search/FilterPrice.vue";
import TheTransition from "../../components/widget/TheTransition.vue";
import HouseCard from "@/components/card/HouseCard.vue";
import axios from "axios";
export default {
  data() {
    return {
      // PAGINATION
      properties: {},
      pagination: {
        current: 1,
        total: 0,
      },
      district_id: "",
      type: "",
      price: "",
      isFound: true,
      notFoundMessage: "",
      loading: true,
      emoji: "",
      // Warning and Success Alert
      isAlert: false,
      progress: 0,
      alertMessage: "",
      alertBackground: "",
      alertIcon: "$success",
    };
  },
  methods: {
    async getProperties() {
      let url = "/properties/pagination?page=" + this.pagination.current;
      if (this.district_id !== "") {
        url = url + "&district_id=" + this.district_id;
      } else if (this.type != "") {
        url = url + "&type=" + this.type;
      } else if (this.price != "") {
        url = url + "&min=" + this.price.min + "&max=" + this.price.max;
      }
      try {
        const response = await Promise.all([axios.get(url)]);
        console.log(response[0].data);
        this.emoji = response[0].data.emoji;
        this.properties = response[0].data.data.data;
        this.pagination.total = response[0].data.data.last_page;
        this.isFound = true;
      } catch (err) {
        this.notFoundMessage = err.response.data.message;
        this.isFound = false;
      }
    },
    async onPageChange() {
      this.loading = true;
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      });
      await this.getProperties();
      this.loading = false;
    },
    // Search district
    async onSearch(id) {
      this.district_id = id;
      await this.getProperties();
    },
    async onInput(value) {
      if (value == "") {
        this.district_id = "";
        await this.getProperties();
      }
    },
    // Select type house or room
    async onSelect(value) {
      this.loading = true;
      this.type = value;
      await this.getProperties();
      this.loading = false;
    },
    // Filter house by price
    onPrice(value) {
      this.price = value;
      this.getProperties();
    },
    // Rating Star
    async rateStar(property) {
      await axios
        .post("/properties/ratings", property)
        .then(() => {})
        .catch((err) => err);
    },
    alert(val) {
      if (val) {
        if (val.type == "warning") {
          this.alertBackground = "bg-orange-darken-2";
          this.alertMessage = val.message;
          this.alertIcon = "$warning";
        } else {
          this.alertMessage = val.message;
          this.alertBackground = "bg-green-accent-3";
        }
        this.isAlert = true;
        const inProgress = setInterval(() => {
          this.progress = this.progress + 10;
        }, 100);
        setTimeout(() => {
          this.isAlert = false;
          this.progress = 0;
          clearInterval(inProgress);
        }, 3000);
      } else {
        this.isAlert = false;
      }
    },
  },
  watch: {
    district_id(val) {
      if (val != "") {
        this.getProperties();
      }
      return true;
    },
  },
  components: {
    SearchLocation,
    FilterType,
    FilterByPrice,
    TheTransition,
    HouseCard,
  },
  async mounted() {
    await this.getProperties();
    this.loading = false;
  },
};
</script>

<style scoped>
#container {
  height: 100vh;
}

.v-progress-linear {
  transition: 2s;
}

#transition {
  position: sticky;
  top: 0;
  z-index: 100000;
}

.no-result {
  background: white;
}
</style>
