<template>
  <v-container>
    <v-row class="mt-7 mb-10 mx-md-9" align="center" id="banner">
      <v-col>
        <div class="pr-3">
          <h1 id="h1-banner" class="text-green-accent-3 mb-2">OUR TEAMS</h1>
          <p>
            Welcome to our team at Dream House! We are a dedicated group of
            professionals who are passionate about helping you find the perfect
            rental home for your needs.
          </p>
          <br />
          <p>
            Our team is made up of experienced real estate agents who have
            extensive knowledge of the rental market. We understand that finding
            the right rental property can be a daunting task, but we are here to
            guide you every step of the way.
          </p>
        </div>
      </v-col>
      <v-col class="">
        <v-img
          :src="require('../../assets/home/about.png')"
          width="600"
          class="home-img"
        ></v-img>
      </v-col>
    </v-row>
    <v-row class="my-16 d-flex flex-column" align="center">
      <h1 id="h1-home">Our Information</h1>
    </v-row>
    <v-row class="my-16 d-flex flex-column justify-center" align="center">
      <v-card class="card d-flex">
        <div class="img">
          <v-img
            :src="require('../../assets/about/sal.jpg')"
            class="about-img"
          ></v-img>
        </div>
        <div class="info d-flex flex-column">
          <h3 class="text-green-accent-3 mb-5 mt-5">SCRUM MASTER</h3>
          <p>
            Hello! My name is <strong>Visal Sork</strong>. I can manage
            something on this site. I want to create every feature that can help
            you. If you have any problems, please contact me. Thank you
          </p>
          <div class="contact mt-5">
            <v-icon
              class="mdi mdi-facebook"
              color="grey darken-3 mr-4"
            ></v-icon>
            <v-icon class="mdi mdi-email" color="grey darken-3 mr-4"></v-icon>
            <v-icon
              class="mdi mdi-instagram"
              color="grey darken-3 mr-4"
            ></v-icon>
          </div>
        </div>
      </v-card>
      <div class="cards d-flex mt-16">
        <v-card class="card d-flex mr-5">
          <div class="img">
            <v-img
              :src="require('../../assets/about/yoer.jpg')"
              class="about-img"
            ></v-img>
          </div>
          <div class="info d-flex flex-column">
            <h3 class="text-green-accent-3 mb-3 mt-2">DEVOPS</h3>
            <p>
              Hello! My name is <strong>Sreyyoer Yoem</strong>. I am very happy
              to have the opportunity to create this program to easily find a
              house to rent. If you have any suggestions and would like to
              update, please contact me. Thank you
            </p>
            <div class="contact mt-3">
              <v-icon
                class="mdi mdi-facebook"
                color="grey darken-3 mr-4"
              ></v-icon>
              <v-icon class="mdi mdi-email" color="grey darken-3 mr-4"></v-icon>
              <v-icon
                class="mdi mdi-instagram"
                color="grey darken-3 mr-4"
              ></v-icon>
            </div>
          </div>
        </v-card>
        <v-card class="card d-flex">
          <div class="img">
            <v-img
              :src="require('../../assets/about/darath.jpg')"
              class="about-img"
            ></v-img>
          </div>
          <div class="info d-flex flex-column">
            <h3 class="text-green-accent-3 mb-5 mt-5">CODE QUALITY</h3>
            <p>
              Hello! My name is <strong>Darath Poum</strong>. I'm so excited to
              make it easy for you to find a rental home. If you have any
              questions, please contact me, thank you
            </p>
            <div class="contact mt-5">
              <v-icon
                class="mdi mdi-facebook"
                color="grey darken-3 mr-4"
              ></v-icon>
              <v-icon class="mdi mdi-email" color="grey darken-3 mr-4"></v-icon>
              <v-icon
                class="mdi mdi-instagram"
                color="grey darken-3 mr-4"
              ></v-icon>
            </div>
          </div>
        </v-card>
      </div>
      <div class="cards d-flex mt-16">
        <v-card class="card d-flex mr-5">
          <div class="img">
            <v-img
              :src="require('../../assets/about/phally.jpg')"
              class="about-img"
            ></v-img>
          </div>
          <div class="info d-flex flex-column">
            <h3 class="text-green-accent-3 mb-5 mt-5">QA MANAGER</h3>
            <p>
              Hello! My name is <strong>Phally Hoeurng</strong> . I am here to
              help you find a rental house or rental room, if you have any
              problems or questions you can contact me. Thank you
            </p>
            <div class="contact mt-3">
              <v-icon
                class="mdi mdi-facebook"
                color="grey darken-3 mr-4"
              ></v-icon>
              <v-icon class="mdi mdi-email" color="grey darken-3 mr-4"></v-icon>
              <v-icon
                class="mdi mdi-instagram"
                color="grey darken-3 mr-4"
              ></v-icon>
            </div>
          </div>
        </v-card>
        <v-card class="card d-flex">
          <div class="img">
            <v-img
              :src="require('../../assets/about/sreyrea.jpg')"
              class="about-img"
            ></v-img>
          </div>
          <div class="info d-flex flex-column">
            <h3 class="text-green-accent-3 mb-5 mt-5">UX/UI MANAGER</h3>
            <p>
              Hello! My name is <strong>Sreyrea Han</strong>. I'm very happy
              because I can create features in this site to help you save time
              using this site. If you have any problems or questions, please
              contact me. Thank you
            </p>
            <div class="contact mt-3 mb-5">
              <v-icon
                class="mdi mdi-facebook"
                color="grey darken-3 mr-4"
              ></v-icon>
              <v-icon class="mdi mdi-email" color="grey darken-3 mr-4"></v-icon>
              <v-icon
                class="mdi mdi-instagram"
                color="grey darken-3 mr-4"
              ></v-icon>
            </div>
          </div>
        </v-card>
      </div>
    </v-row>
  </v-container>
</template>

<script setup></script>

<style scoped>
.card {
  width: 60%;
}
.cards {
  width: 100%;
  margin: 0;
}

#h1-banner {
  font-size: 60px;
}
#h1-home {
  margin: 20px 16px 0 0;
  border-bottom: 3px solid #00e676;
}
.about-img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
}
.img {
  flex: 1;
  margin: 10px;
  margin-left: 5%;
}
.info {
  flex: 2;
}
</style>
