<template>
  <div>
    <TheNavbar></TheNavbar>
    <div>
      <v-btn class="ma-2" color="orange-darken-2">
        <v-icon start icon="mdi mdi-arrow-left"></v-icon>
        Back
      </v-btn>
    </div>
    <div class="card">
      <div class="d-flex mr-4">
        <div class="img">
          <img src="https://wakefitdev.gumlet.io/img/sofa-sets/lifestyle/WSFAFLPN2FOGR1.jpg?w=732" alt="">
        </div>
        <div class="card-center">
          <h3 class="title">Home</h3>
          <p>Home Family</p>
          <p> <v-icon icon="mdi mdi-star"></v-icon>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, vel! Cum, ullam error. Ad fugit ratione necessitatibus tempora officiis impedit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum ut
            odit illum numquam quaerat. Dolores repudiandae neque architecto eos unde?</p>
          <p><img src="https://cdn-icons-png.flaticon.com/512/1865/1865269.png" alt="" class="location"> PP,Sen Sok</p>
          <div class="star d-flex">
            <div v-for="i in 5" :key="i" class="star">
              <v-icon size="" color="" icon="mdi mdi-star"></v-icon>
            </div>
          </div>
          <p class="price">200$/Month</p>
        </div>
      </div>
      <div class="button">
        <v-btn>Book</v-btn>
        <v-icon icon="mdi mdi-delete " color="red"></v-icon>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {

}
</script>
  
<style scoped>
.card {
  margin: 10px auto;
  width: 70%;
  background-color: rgba(205, 208, 212, 0.8);
  border-radius: 10px;
  transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

.card:hover {
  transform: translateY(-5px);
  background-color: rgba(121, 89, 106, 0.26);
}

.img,
img {
  width: 90%;
  height: 60%;
  border-radius: 10px;
}

.img {
  width: 80%;
}

.star {
  display: flex;
  flex-direction: row;
  color: rgb(248, 245, 83);
}


.button {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 10px;
  width: 90%;
  margin-top: -65px;
}
.card,.button{
  justify-content: end;
}
.button button {
  padding: 10px 20px;
  background-color: #3cb371;
  border: none;
  border-radius: 5px;
  color: #fff;
  margin-right: 60px;
  
}

.button button:hover {
  background-color: #2ecc71;
}



.price {
  margin-top: 15px;
  margin-bottom: 15px;
  font-size: larger;
  color: #2ecc71;
  transition: color 0.3s ease-in-out;
}

.card:hover button {
  background-color: #d35400;
  transition: background-color 0.3s ease-in-out;
}

.card:hover v-icon {
  color: #b4a2a2;
  transition: color 0.3s ease-in-out;
}

.location {
  width: 20px;
  height: 20px;
}

.flower {
  width: 15px;
  height: 15px;
}

.card-center {
  align-items: center;
  margin-left: 50px;
}

.title {
  color: blue;
}
</style>