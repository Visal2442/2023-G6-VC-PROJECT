<template>
  <div class="container">
    <div class="card">
      <div class=" item">
        <img src="../../assets/google.png" alt="Card Image">

        <div class="overlay">
          <div class="overlay-content">
            <h2>Card Title</h2>
            <p>Card content goes here.</p>
          </div>
          <div class="bnt">
            <a href="#" class="bnt-detail">Detail</a>
            <a href="#" class="bnt-booking">Book Now</a>
          </div>
        </div>
        <div class="d-flex justify-space-between p-5 bg-green mt-6">
          <div class="price pa-2  d-flex flex-column justify-end ml-3">
            <p class="ma-0 text-body-1 font-weight-bold">
              $500/Month
            </p>
            <div class="star d-flex">
              <div v-for="i in 5" :key="i" class="star">
                <v-icon size="" color="" icon="mdi mdi-star"></v-icon>
              </div>
            </div>
          </div>
          <div class="icon d-flex justify-center align-center">
            <v-icon size="24" color="widte" class="mr-5" icon="mdi mdi-message-text"></v-icon>
            <v-icon size="24" class="mr-4" color="widte" icon="mdi mdi-content-save"></v-icon>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>
 
 <!-- Get code form AI -->
<style scoped>
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.card {
  margin-top: 15%;
  position: relative;
  width: 350px;
  height: 300px;
  overflow: hidden;
  border-radius: 4px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.1s;
}

/* Add a hover effect to the image */
.item:hover img {
  transform: scale(1.1);
}


.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 79%;
  opacity: 0;
  transition: opacity 0.2s;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #fff;
  text-align: center;
}

/* Add a hover effect to the overlay */
.item:hover .overlay {
  opacity: 1;
}

.overlay-content {
  margin-top: 5%;
}

.bnt-booking,
.bnt-detail {
  padding: 8px 16px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.2s, color 0.2s;
}

.bnt {
  display: flex;
  justify-content: flex-end;
  width: 100%;
  margin-top: 30%;
  margin-right: 10%;
}

.bnt-booking {
  background-color: green;
  color: white;
  margin-left: 20px;

}
.bnt-detail {
  background-color: orange;
  color: #000;
}
.button:hover {
  background-color: #000;
  color: #fff;
}

v-icon {
  width: 70px;
}</style>