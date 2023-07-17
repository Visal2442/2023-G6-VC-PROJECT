<template>
     <div
    class="bg-grey-darken-3 text-center d-flex flex-column"
  >
    <div class="footer">
        <div class="item pt-0 mx-4">
            <h3>Contact Us</h3>
            <span>Email: </span>rentalhouse@gmail.com
            <span>Phone number: </span>+855 883651987
        </div>
        <div class="item pt-0 mx-4">
            <h3>About Us</h3> citudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </div>
        <div class="item pt-0 mx-4">
            <h3>Location</h3>
            <p>BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh</p>
        </div>

        </div>

    <div>
      {{ new Date().getFullYear() }} — <strong>Rentalhouse</strong>
    </div>
    </div>
</template>

<script >
 export default {
    data: () => ({
      
    }),
  }
</script>

<style scoped>
.footer{
    display: flex;

}
.item{
    margin: 30px;
    text-align: start;

}
img{
    width: 100px;
}
.footer-center{
    display: flex;
    justify-content: center;
    border-top: 1px solid rgb(240, 239, 239);
    border-bottom: 1px solid rgb(255, 250, 250);
    align-items: center;
    margin-bottom: 10px;
}

.icon {
    margin: 10px;
    color: white;
}


h3{
    margin-bottom: 10px;
}
icon{
    color:"white";
}

h3 {
    margin-bottom: 10px;
}

icon {
    color: "white";

}
</style>