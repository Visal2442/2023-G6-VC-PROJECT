<template>
     <div class="price-type">
          <div class="select">

               <div class="price">
                    <select name="Price" id="price">
                         <option value="Select Price">Select Price</option>
                         <option value="200$">200$</option>
                         <option value="300$">300$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                    </select>

               </div>
               <div class="type">
                    <select name="type" id="type">
                         <option value="Select Type">Select Type</option>
                         <option value="house">House</option>
                         <option value="room">Room</option>
                    </select>
               </div>
          </div>
     </div>
</template>

<script>
export default {
     data() {
          return {

          }
     },
}
</script>
<style scoped>
.price-type {
     display: flex;
     justify-content: center;
     align-items: center;
     /* margin-top: -38%; */
     /* margin-bottom: 35%; */
}

.select {

     display: flex;
     align-items: center;
     justify-content: space-evenly;
     width: 45%;
}

.price,
.type {
     width: 50%;
}

select {

     width: 95%;
     text-align: center;
     padding: 8px;
     background: white;
     border-radius: 5px;

}
</style>