<template>
     <div>
          <div class="banner">
               <div class="banner-img">
                    <img src="../../assets/banner.jpg" alt="" width="1280" height="640">
               </div>
               <div class="bg-text">
                    <h1>Rental House</h1>
               </div>

          </div>
          <v-card>
               <div class="d-flex justify-center mt-5">
                    <div class="imgage1 ">
                         <img src="../../assets/banner1.jpg" alt="" height="350" width="400">
                    </div>
                    <div class="text1 d-flex ">
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem maxime totam ducimus
                              distinctio. Voluptate neque fugiat hic iusto recusandae, eos earum vitae sit magnam atque
                              consequuntur ipsum veniam ipsa.
                         </p>
                    </div>
               </div>
               <div class="d-flex mt-5">
                    <div class="text2 d-flex ">
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem maxime totam ducimus
                              distinctio. Voluptate neque fugiat hic iusto recusandae, eos earum vitae sit magnam atque
                              consequuntur ipsum veniam ipsa.
                         </p>
                    </div>
                    <div class="imgage2 ">
                         <img src="../../assets/banner.jpg" alt="" height="350" width="400">
                    </div>
               </div>
          </v-card>
     </div>
</template>

<script setup>

</script>

<style scoped>
.banner {
     position: relative;
}

/* .bg-text {
     background: #d85959;
     width: 100px;
     height: 100px;

} */

h1 {
     /* position: absolute; */
     margin-top: -15%;
     margin-bottom: 15%;
     margin-left: -50%;
     font-size: 70px;
     color: white;

}

.imgage2 {
     display: flex;
     flex: 2;
     justify-content: center;
     margin-right: 5%;

}

.imgage1 {
     display: flex;
     flex: 2;
     justify-content: center;
     margin-left: 5%;

}

.imgage1 img,
.imgage2 img {
     border-radius: 5px;
}

.text1,
.text2 {
     display: flex;
     flex: 3;
     align-items: center;
}

.text1 p {
     margin-right: 40px;
     text-align: start;
}

.text2 p {
     margin-left: 50px;
     text-align: end;

}
</style>